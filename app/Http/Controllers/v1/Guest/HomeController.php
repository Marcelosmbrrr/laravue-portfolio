<?php

namespace App\Http\Controllers\v1\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TechSet;
use App\Models\Project;

class HomeController extends Controller
{
    public function __construct(TechSet $techSetModel, Project $projectModel)
    {
        $this->techSetModel = $techSetModel;
        $this->projectModel = $projectModel;
    }

    public function __invoke(Request $request)
    {
        //
    }
}
