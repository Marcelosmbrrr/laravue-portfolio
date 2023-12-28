<?php

namespace App\Http\Resources\Administration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostsResource extends ResourceCollection
{
    private array $payload = [];

    public function toArray(Request $request): array
    {
        foreach ($this->collection as $index => $post) {

            $this->payload["posts"][$index] = [
                "id" => $post->id,
                "phase" => $post->phase,
                "image_url" => Storage::disk('public')->url("images/posts/" . $post->uuid . ".png"),
                "name" => $post->name,
                "description" => $post->description,
                "technology" => $post->technology,
                "created_at" => $post->created_at,
                "updated_at" => $post->updated_at
            ];
        }

        $this->payload["pagination"] = [
            "records" => $this->total(),
            "pages" => $this->lastPage()
        ];

        return $this->payload;
    }
}
