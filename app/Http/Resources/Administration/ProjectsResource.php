<?php

namespace App\Http\Resources\Administration;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProjectsResource extends ResourceCollection
{
    private array $payload = [];

    public function toArray(Request $request): array
    {
        $this->payload["projects"] = [];
        foreach ($this->collection as $index => $project) {

            $this->payload["projects"][$index] = [
                "id" => $project->id,
                "phase" => $project->phase,
                "name" => $project->name,
                "image_url" => Storage::disk('public')->url($project->image_path),
                "description" => $project->description,
                "technology" => json_decode($project->technology),
                "created_at" => $project->created_at,
                "updated_at" => $project->updated_at
            ];
        }

        $this->payload["pagination"] = [
            "records" => $this->total(),
            "pages" => $this->lastPage()
        ];

        return $this->payload;
    }
}
