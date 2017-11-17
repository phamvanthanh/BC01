<?php 
use App\Models\BaseModel;
use DB;

abstract class Model extends BaseModel {
        
     static protected function _getTableName() {
        return self::$table;
     }

     static protected function _getFillable() {
        return self::$fillable;
     }
 
     static protected function _getAttribute() {
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
     static private function _buildJoinedTable() {
          $table = self::_getTableName();
          return 'DB::table("'.$table.'")';
     }
     static protected function _buildPaginateSelectQuery(Array $params) {
          extract($params); 
          $table = self::_getTableName();
          $selectable = self::_getAttribute();         

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
          $fillable = self::_getAttribute();          
          return DB::table($table)        
          ->select($fillable)          
          ->get()
          ->toArray();   

     }
}