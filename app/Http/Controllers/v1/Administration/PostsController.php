<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use App\Http\Requests\Administration\Posts\CreatePostRequest;
use App\Http\Requests\Administration\Posts\UpdatePostRequest;
use App\Http\Resources\Administration\PostsResource;

class PostsController extends Controller
{
    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function index()
    {
        $limit = request()->limit;
        $page = request()->page;
        $search = request()->search ?? null;

        $data = $this->postModel->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%");
        })->paginate($limit, ['*'], 'posts', $page);

        return response(new PostsResource($data), 200);
    }

    public function create()
    {
        return Inertia::render("Administration/Posts/CreatePost");
    }

    public function store(CreatePostRequest $request)
    {
        $post = $this->postModel->create([...$request->validated(), 'uuid' => Str::uuid()]);

        $image_path = "images/posts/" . $post->uuid . ".png";
        Storage::disk('public')->put($image_path, $request->image);

        return response("Post criado com sucesso!", 201);
    }

    public function edit(Request $request)
    {
        $post = $this->postModel->where("uuid", $request->uuid)->first();

        $payload = [
            "id" => $post->id,
            "name" => $post->name,
            "category" => $post->category,
            "description" => $post->description,
            "content" => json_decode($post->content),
        ];

        return Inertia::render("Administration/Posts/EditPost", $payload);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = $this->postModel->find($id);
        $post->update($request->validated());

        if ($request->image) {
            $image_path = "images/posts/" . $post->uuid . ".png";
            Storage::disk('public')->put($image_path, $request->image);
        }

        return response("Post atualizado com sucesso!", 200);
    }

    public function destroy(string $id)
    {
        $post = $this->postModel->find($id);
        $post->delete();

        Storage::disk('public')->delete("images/posts/" . $post->uuid . ".png");

        return response("Post deletado com sucesso!", 200);
    }
}
