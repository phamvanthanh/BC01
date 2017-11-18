<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
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
    * @return Job Model
    *
    */ 
    public function show($id) {
        return Job::find($id);
    }

    /**
    * @param void
    * @return Array of Job Models
    *
    */ 
    public function all() {
        return Job::all();
    }

    
    
    /**
    * @param Request $request
    * @return void
    *
    */
    public function create() {

        return Job::create();
    }

     /**
    * @param Request $request
    * @return void
    *
    */
    public function update() {

        return Job::update();
    }
    


    //
}
