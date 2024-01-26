<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
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
        $orderBy = request()->orderBy;
        $page = request()->page;
        $search = request()->search ?? null;

        $data = $this->projectModel->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%");
        })->orderBy($orderBy, 'asc')->paginate($limit, ['*'], 'projects', $page);

        return response(new ProjectsResource($data), 200);
    }

    public function store(CreateProjectRequest $request)
    {
        DB::transaction(function () use ($request) {

            $image_path = "projects/no-image/img-1.png";
            if ($request->has('image')) {
                $image_path = "projects/$request->uuid/img-1.png";
                $image_content = file_get_contents($request->image);
                Storage::disk('public')->put($image_path, $image_content);
            }

            $this->projectModel->create([...$request->validated(), 'uuid' => $request->uuid, 'image_path' => $image_path]);
        });

        return response("Project created successfully!", 201);
    }

    public function update(UpdateProjectRequest $request, string $id)
    {
        DB::transaction(function () use ($request, $id) {

            $project = $this->projectModel->find($id);
            $project->update($request->validated());

            if (is_file($request->image)) {
                $image_path = "images/projects/" . $project->uuid . ".png";
                Storage::disk('public')->put($image_path, $request->image);
            }
        });

        return response("Project updated successfully!", 200);
    }

    public function destroy(Request $request)
    {
        DB::transaction(function () use ($request) {

            $project = $this->projectModel->findMany($request->ids);
            foreach ($project as $project) {
                $project->delete();
                Storage::disk('public')->delete("images/projects/" . $project->uuid . ".png");
            }

        });

        return response("Projects deleted successfully!", 200);
    }
}
