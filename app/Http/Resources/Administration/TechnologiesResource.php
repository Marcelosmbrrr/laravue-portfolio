<?php

namespace App\Http\Resources\Administration;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TechnologiesResource extends ResourceCollection
{
    private array $payload = [];

    public function toArray(Request $request): array
    {
        $this->payload["techs"] = [];
        foreach ($this->collection as $index => $tech) {

            $this->payload["techs"][$index] = [
                "id" => $tech->id,
                "name" => $tech->name,
                "description" => $tech->description,
                "icon" => json_decode($tech->icon),
                "created_at" => $tech->created_at,
                "updated_at" => $tech->updated_at
            ];
        }

        $this->payload["pagination"] = [
            "records" => $this->total(),
            "pages" => $this->lastPage()
        ];

        return $this->payload;
    }
}
