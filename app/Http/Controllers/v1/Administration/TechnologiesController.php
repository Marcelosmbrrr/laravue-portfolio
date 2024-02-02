<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;
use App\Http\Requests\Administration\Technologies\CreateTechnologyRequest;
use App\Http\Requests\Administration\Technologies\UpdateTechnologyRequest;
use App\Http\Resources\Administration\TechnologiesResource;

class TechnologiesController extends Controller
{
    public function __construct(Technology $technologyModel)
    {
        $this->technologyModel = $technologyModel;
    }

    public function index()
    {
        $limit = request()->limit;
        $orderBy = request()->orderBy;
        $page = request()->page;
        $search = request()->search ?? null;

        $data = $this->technologyModel->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%")->orWhere('phase', 'like', "%{$search}%");
        })->orderBy($orderBy, 'asc')->paginate($limit, ['*'], 'technologies', $page);

        return response(new TechnologiesResource($data), 200);
    }

    public function store(CreateTechnologyRequest $request)
    {
        $this->technologyModel->create([
            "name" => $request->name,
            "description" => $request->description,
            "icon" => json_encode($request->icon)
        ]);

        return response("Technology created successfully!", 201);
    }

    public function update(UpdateTechnologyRequest $request, string $id)
    {
        $tech = $this->technologyModel->find($id);

        $tech->update([
            "name" => $request->name,
            "description" => $request->description,
            "icon" => json_encode($request->icon)
        ]);

        return response("Technology updated successfully!", 200);
    }

    public function destroy(Request $request)
    {
        $techs = $this->technologyModel->findMany($request->ids);
        foreach ($techs as $tech) {
            $tech->delete();
        }

        return response("Technologies deleted successfully!", 200);
    }
}
