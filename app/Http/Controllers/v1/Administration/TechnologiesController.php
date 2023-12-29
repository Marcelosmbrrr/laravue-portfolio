<?php

namespace App\Http\Controllers\v1\Administration;

use App\Http\Controllers\Controller;
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
        $page = request()->page;
        $search = request()->search ?? null;

        $data = $this->technologyModel->when($search, function ($query) use ($search) {
            $query->where('name', 'like', "%{$search}%")->orWhere('description', 'like', "%{$search}%")->orWhere('phase', 'like', "%{$search}%");
        })->paginate($limit, ['*'], 'technologies', $page);

        return response(new TechnologiesResource($data), 200);
    }

    public function store(CreateTechnologyRequest $request)
    {
        $tech = $this->technologyModel->create($request->validated());

        return response("Tecnologia criada com sucesso!", 201);
    }

    public function update(UpdateTechnologyRequest $request, string $id)
    {
        $tech = $this->technologyModel->find($id);
        $tech->update($request->validated());

        return response("Tecnologia atualizada com sucesso!", 200);
    }

    public function destroy(string $id)
    {
        $tech = $this->technologyModel->find($id);
        $tech->delete();

        return response("Tecnologia deletada com sucesso!", 200);
    }
}
