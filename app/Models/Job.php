<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Jobs\JobInterface;
use App\Traits\Jobs\JobTrait;
use App\Traits\ModelTrait;
use DB;

class Job extends Model implements JobInterface{
    
    protected  $table = 'jobs'; 
    protected  $fillable = [
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
        $class = __CLASS__;
        return new $class();
    }
  
   
    // use ModelTrait;
    use JobTrait;
    
   
    
}