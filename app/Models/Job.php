<?php
namespace App\Models;

class Job extends Model{
    
    const LIMIT = 50;
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
    protected $timestamps = true;
    protected $hidden = [];
    
    //  static public function _getInstance(){
    //      return new Job();
    //  }
 
            
}