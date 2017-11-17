<?php 
namespace App\Models;
use App\Models\BaseModel;
use DB;

abstract class Model extends BaseModel {
     const LIMIT = 50;  
   
     static public function _getInstance(){
         return new static();
     }
     static public function _getTableName() {
        return self::_getInstance()->table;
     }

     static public function _getFillable() {
        return self::_getInstance()->fillable;
     }
 
     static public function _getAttribute() {
        $instance = self::_getInstance();
        $table = $instance->table;
        $selectable = $instance->fillable;
        if($instance->timestamps === false)
            array_unshift($selectable, 'id');
        else
            array_unshift($selectable, 'id', 'created_at', 'updated_at');
        
        return array_map(function($e) use($table){
            return $table.'.'.$e;
        },$selectable);
     }
     static protected function _buildJoinedTable() {
          $table = self::_getTableName();
          return 'DB::table("'.$table.'")';
     }
     static protected function _buildPaginateSelectQuery(Array $params) {
          extract($params); 
          $table = self::_getTableName();
          $selectable = static::_getAttribute();         

          $limit = (isset($limit) && is_integer($limit))? $limit : self::LIMIT;
          $ascending = (isset($ascending) && $ascending) == 1? 'ASC' : 'DESC';
          $orderBy = isset($orderBy) ? $orderBy: $table.'.id';
          $query = isset($query) ? $query: '';
          
          $whereCondition = '';

          foreach($selectable as $field) {
              $whereCondition .= '->orWhere("'.$field.'", "LIKE", "%'.$query.'%")';
          }

          return '->select(["'.implode('","',$selectable).'"])'.$whereCondition.'->orderBy("'.$orderBy.'","'. $ascending.'")->paginate('.$limit.')->toArray();';   
                    
     } 
     
     static public function _find($value) {
        
        $selectable = self::_getAttribute();
        $table = self::_getTableName();
      
        return DB::table($table)      
            ->select($selectable)
            ->where('id', $value)
            ->first();
                
     }

     static public function _get(Array $params) {
         $joinedTable = static::_buildJoinedTable();
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
          $fillable = self::_getAttribute();          
          return DB::table($table)        
          ->select($fillable)          
          ->get()
          ->toArray();   

     }
     static public function _delete($value) {
         $table = self::_getTableName();
         DB::table($table)->where('id',  $value)->delete();
     }
}