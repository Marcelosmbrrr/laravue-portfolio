<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Models\Project;
use App\Http\Requests\Administration\Projects\CreateProjectRequest;
use App\Http\Requests\Administration\Projects\UpdateProjectRequest;
use App\Http\Resources\Administration\ProjectsResource;

class ProjectsController extends Controller
{
    public function __construct(Project $projectModel)
    {
        $this->projectModel = $projectModel;
    }

    public function index()
    {
        $limit = request()->limit;
        $page = request()->page;

        $data = $this->projectModel->paginate($limit, ['*'], 'projects', $page);

        return response(new ProjectsResource($data), 200);
    }

    public function store(CreateProjectRequest $request)
    {
        $project = $this->projectModel->create($request->validated());

        $image_path = "images/projects/" . $project->uuid . ".png";

        Storage::disk('public')->put($image_path, $request->image);

        return response("Projeto criado com sucesso!s", 201);
    }

    public function update(UpdateProjectRequest $request, string $id)
    {
        $project = $this->projectModel->find($id);
        $project->update($request->validated());

        if ($request->image) {
            $image_path = "images/projects/" . $project->uuid . ".png";
            Storage::disk('public')->put($image_path, $request->image);
        }

        return response("Projeto atualizado com sucesso!", 200);
    }

    public function destroy(string $id)
    {
        $project = $this->projectModel->find($id);
        $project->delete();

        Storage::disk('public')->delete("images/projects/" . $project->uuid . ".png");

        return response("Projeto deletado com sucesso!", 200);
    }
}
