<?php

namespace App\Http\Controllers\v1\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Technology;
use App\Models\Project;
use App\Models\Post;

class HomeController extends Controller
{
    public function __construct(Technology $techModel, Project $projectModel, Post $postModel)
    {
        $this->techModel = $techModel;
        $this->projectModel = $projectModel;
        $this->postModel = $postModel;
    }

    public function homePage(Request $request)
    {
        $projects = $this->projectModel->all();
        $technologies = $this->techModel->all();
        $posts = $this->postModel->all();

        $payload = ["projects" => [], "technologies" => [], "posts" => []];

        foreach ($projects as $index => $project) {

            $payload['projects'][$index] = [
                "id" => $project->id,
                "uuid" => $project->uuid,
                "phase" => $project->phase,
                "name" => $project->name,
                "description" => $project->description,
                "technology" => json_decode($project->technology),
                "image_src" => Storage::url($project->image_path),
                "created_at" => $project->created_at,
                "updated_at" => $project->updated_at
            ];
        }

        foreach ($technologies as $index => $tech) {

            $payload['technologies'][$index] = [
                "id" => $tech->id,
                "name" => $tech->name,
                "description" => $tech->description,
                "icon" => json_decode($tech->icon)
            ];
        }

        foreach ($posts as $index => $post) {

            $payload['posts'][$index] = [
                "uuid" => $post->uuid,
                "name" => $post->name,
                "category" => $post->category,
                "description" => $post->description,
                "image_src" => Storage::url($post->image_path),
            ];
        }

        return Inertia::render('Guest/Home', $payload);
    }

    function postPage(Request $request)
    {
        $post = $this->postModel->where("uuid", $request->uuid)->first();

        $images = Storage::disk("public")->files("posts/" . $post->uuid);
        foreach ($images as $index => $image) {
            $images[$index] = Storage::url($image);
        }

        $payload["post"] = [
            "uuid" => $post->uuid,
            "name" => $post->name,
            "category" => $post->category,
            "content" => json_decode($post->content),
            "image_src" => Storage::url($post->image_path)
        ];

        return Inertia::render('Guest/Post', $payload);
    }
}
