<?php

namespace App\Http\Controllers\v1\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use App\Models\Technology;
use App\Models\Project;

class HomeController extends Controller
{
    public function __construct(Technology $techModel, Project $projectModel)
    {
        $this->techModel = $techModel;
        $this->projectModel = $projectModel;
    }

    public function __invoke(Request $request)
    {

        $projects = $this->projectModel->all();
        $technologies = $this->techModel->all();

        $payload = [];
        foreach($projects as $index => $project){

            $payload['projects'][$index] = [
                "id" => $project->id, 
                "uuid" => $project->uuid,
                "phase" => $project->phase,
                "name" => $project->name,
                "description" => $project->description,
                "technology" => json_decode($project->technology),
                "image" => Storage::url('projects/' . $project->uuid . '/img1.png'),
                "created_at" => $project->created_at,
                "updated_at" => $project->updated_at
            ];

        }

        foreach($technologies as $index => $tech){

            $payload['technologies'][$index] = [
                "id" => $tech->id, 
                "name" => $tech->name,
                "description" => $tech->description,
                "icon" => json_decode($tech->icon)
            ];

        }

        return Inertia::render('Guest/Home', $payload);
    }
}
