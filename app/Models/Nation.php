<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Nation extends Model{
    
    protected  $table = 'nations'; 
    protected  $fillable = [
        'name',
        'abbr'
        
    ];
    // protected static $selectable;
   
    protected static function instance() {
        return new Nation();
    }
  
}