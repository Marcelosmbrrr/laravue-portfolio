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
        $this->payload["posts"] = [];
        foreach ($this->collection as $index => $post) {

            $images = Storage::files("posts/" . $post->uuid);
            foreach ($images as $index => $image) {
                $images[$index] = Storage::url($image);
            }

            $this->payload["posts"][$index] = [
                "id" => $post->id,
                "uuid" => $post->uuid,
                "name" => $post->name,
                "images_url" => $images,
                "description" => $post->description,
                "content" => json_decode($post->content),
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
