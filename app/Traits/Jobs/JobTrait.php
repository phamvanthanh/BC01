<?php 
namespace App\Traits\Jobs;
use App\Traits\ModelTrait;
use DB;
trait JobTrait {
    use ModelTrait;
     

    static public function _find($value) {
          return self::find($value);
                
     }

     static public function _create(array $columns) {
          return self::create($columns);
              
     }

     static public function _update(array $columns) {
          return self::where('id', $columns['id'])
                     ->update($columns);


     }
     static public function _all() {
          $table = self::_getTableName();
          $fillable = self::_getSelectable();          
          return DB::table($table)        
          ->select($fillable)          
          ->paginate(100000)
          ->toArray();   

     }
        
}
