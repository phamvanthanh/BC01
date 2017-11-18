<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\EJob;

class EJobController extends Controller
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
    * @param EJob_id
    * @return EJob Model
    *
    */ 
    public function show($id) {
        return EJob::find($id);
    }

    /**
    * @param void
    * @return Array of EJob Models
    *
    */ 
    public function all() {
        return EJob::all();
    }

    
    /**
    * @param Request $request
    * @return void
    *
    */
    public function create() {

        return EJob::create();
    }

     /**
    * @param Request $request
    * @return void
    *
    */
    public function update() {

        return EJob::update();
    }
    


    //
}
