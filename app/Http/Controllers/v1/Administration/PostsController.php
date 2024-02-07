<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
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
        $orderBy = request()->orderBy;
        $page = request()->page;
        $search = request()->search ?? null;

        $data = $this->postModel->when($search, function ($query) use ($search) {
            $query->where("name", "like", "%{$search}%")->orWhere("description", "like", "%{$search}%")->orWhere("category", "like", "%{$search}%");
        })->orderBy($orderBy, 'asc')->paginate($limit, ['*'], 'posts', $page);

        return response(new PostsResource($data), 200);
    }

    public function create()
    {
        return Inertia::render("Administration/Posts/CreatePost");
    }

    public function store(CreatePostRequest $request)
    {
        dd($request->all());
        $post = $this->postModel->create([
            'uuid' => $request->uuid,
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'content' => json_encode(explode(",", $request->content))
        ]);

        if ($request->has("images")) {
            foreach ($request->images as $index => $image) {
                $image_content = file_get_contents($request->image);
                $image_path = "posts/$post->uuid/img" . $index + 1 . ".png";
                Storage::disk('public')->put($image_path, $image_content);
            }
        }

        return response("Post criado com sucesso!", 201);
    }

    public function edit(Request $request)
    {
        $post = $this->postModel->where("uuid", $request->uuid)->first();

        $images = Storage::files("posts/" . $post->uuid);
        dd($images);
        foreach($images as $index => $image){
            $images[$index] = Storage::url($image);
        }

        $payload = [
            "id" => $post->id,
            "name" => $post->name,
            "category" => $post->category,
            "description" => $post->description,
            "content" => json_decode($post->content),
            "images" => $images
        ];

        return Inertia::render("Administration/Posts/EditPost", $payload);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        $post = $this->postModel->find($id);

        $post->update([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'content' => json_encode(explode(",", $request->content))
        ]);

        if ($request->has("images")) {

            Storage::disk('public')->delete("posts/$post->uuid");

            foreach ($request->images as $index => $image) {
                $image_content = file_get_contents($image);
                $image_path = "posts/$post->uuid/img" . $index + 1 . ".png";
                Storage::disk('public')->put($image_path, $image_content);
            }
        }

        return response("Post atualizado com sucesso!", 200);
    }

    public function destroy(string $id)
    {
        $post = $this->postModel->find($id);
        $post->delete();

        Storage::disk('public')->delete("posts/$post->uuid");

        return response("Post deletado com sucesso!", 200);
    }
}
