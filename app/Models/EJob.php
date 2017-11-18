<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EJob extends Model {
    
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
    public $timestamps = true;
    protected $hidden = [];
           
}