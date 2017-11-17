<?php 
namespace App\Traits;
use DB;

trait ModelTrait {
     
     static public function _getInstance() {
        return self::instance();
     }
     static public function _getTableName() {
        return self::$table;
     }

     static public function _getFillable() {
        return self::$fillable;
     }
 
     static public function _getSelectable() {
        $table = self::_getTableName();
        $selectable = self::_getFillable();
        if(self::$timestamps === false)
            array_unshift($selectable, 'id');
        else
            array_unshift($selectable, 'id', 'created_at', 'updated_at');
        
        return array_map(function($e) use($table){
            return $table.'.'.$e;
        },$selectable);
     }
     

    static public function _find($value) {
        $selectable = self::_getSelectable();
        $table = self::_getTableName();
      
        return DB::table($table)      
            ->select($selectable)
            ->where('id', $value)
            ->first();
                
     }
    
     static public function _get(Array $params = []) {
         $joinedTable = self::_buildJoinedTable();
         $selectQuery = self::_buildPaginateSelectQuery($params);
         return eval('return '.$joinedTable.$selectQuery);
     }

     static public function _create(array $columns) {
                     
        $table = self::_getTableName();        
        return DB::table($table)
                 ->insertGetId($columns);
              
     }

     static public function _update(array $columns) {
        $table = self::_getTableName(); 
        return DB::table($table)
                 ->where('id', $columns['id'])
                 ->update($columns);


     }
     static public function _all() {
          $table = self::_getTableName();
          $fillable = self::_getSelectable();          
          return DB::table($table)        
          ->select($fillable)          
          ->get()
          ->toArray();   

     }
}