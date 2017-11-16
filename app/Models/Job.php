<?php
namespace App\Models;
use App\Contracts\ModelInterface;
use App\Traits\Jobs\JobTrait;
use App\Traits\ModelTrait;
use DB;

class Job  implements ModelInterface{
    const LIMIT = 50;
    static protected  $table = 'jobs'; 
    static protected  $fillable = [
        'name',
        'holder_id',
        'parent_id',
        'type',
        'requirement',
        'from_date',
        'to_date',
        'status',
        'bid_status'
    ];
 
   
    static protected function instance() {
        return new Job();     
    }
    static protected $timestamps = true;
    use ModelTrait;
         
}