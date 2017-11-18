<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    /**
    * @param job_id
    * @return Project Model
    *
    */ 
    public function show($id) {
        return Project::find($id);
    }

    /**
    * @param void
    * @return Array of Project Models
    *
    */ 
    public function all() {
        return Project::with('job')->all();
    }
    
    /**
    * @param Request $request
    * @return void
    *
    */
    public function create() {

        return Project::create();
    }

     /**
    * @param Request $request
    * @return void
    *
    */
    public function update() {

        return Project::update();
    }
    


    //
}
