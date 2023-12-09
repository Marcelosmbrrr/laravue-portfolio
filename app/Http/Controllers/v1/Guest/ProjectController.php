<?php

namespace App\Http\Controllers\v1\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function __construct(Project $projectModel)
    {
        $this->projectModel = $projectModel;
    }
    
    public function __invoke(Request $request)
    {
        //
    }
}
