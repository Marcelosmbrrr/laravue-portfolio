<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        DB::transaction(function () use ($request) {

            $image_path = "posts/$request->uuid/img1.png";

            $image_content = file_get_contents($request->image);
            Storage::disk('public')->put($image_path, $image_content);

            $this->postModel->create([
                'uuid' => $request->uuid,
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'content' => json_encode($request->content),
                'image_path' => $image_path
            ]);
        });

        return response("Post created successfully!", 201);
    }

    public function edit(Request $request)
    {
        $post = $this->postModel->where("uuid", $request->uuid)->first();

        $payload["post"] = [
            "id" => $post->id,
            "name" => $post->name,
            "category" => $post->category,
            "description" => $post->description,
            "content" => json_decode($post->content)
        ];

        return Inertia::render("Administration/Posts/EditPost", $payload);
    }

    public function update(UpdatePostRequest $request, string $id)
    {
        DB::transaction(function () use ($request, $id) {

            $post = $this->postModel->find($id);

            $post->update([
                'name' => $request->name,
                'category' => $request->category,
                'description' => $request->description,
                'content' => json_encode($request->content)
            ]);

            if ($request->has('image')) {
                Storage::disk('public')->put($post->image_path, file_get_contents($request->image));
            }
        });

        return response("Post updated successfully!", 200);
    }

    public function destroy(Request $request)
    {
        DB::transaction(function () use ($request) {

            $posts = $this->postModel->findMany($request->ids);

            foreach ($posts as $post) {
                $post->delete();
                Storage::disk('public')->deleteDirectory("posts/" . $post->uuid);
            }
        });

        return response("Posts deleted successfully!", 200);
    }
}
