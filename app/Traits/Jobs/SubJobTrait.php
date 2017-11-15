<?php 
namespace App\Traits\Jobs;
use App\Traits\ModelTrait;
use DB;
 
trait SubJobTrait {
    use ModelTrait;
    
    static public function _getParentTableName() {
        return parent::_getTableName();
    }
    static public function _getParentInstance() {
        return parent::_getInstance();
    }
    static public function _getSelectable() {
         
        $parent_table = self::_getParentTableName();
        $parent_selectable = parent::_getSelectable();
     
        $parent_selectable = array_map( function($e) use($parent_table){
            return $parent_table.".".$e;
        }, $parent_selectable);
        
        $selectable = self::_getInstance()->fillable;
        $table = self::_getTableName();

        $selectable  = array_map( function($e) use($table){
            return $table.".".$e;
        }, $selectable);

        return array_merge($parent_selectable, $selectable);
    }
        
    static public function _find($value) {
       $selectable = self::_getSelectable();
       $table = self::_getTableName();
       $parent_table = self::_getParentTableName();
       return DB::table($table)
          ->Join($parent_table, $table.".job_id", '=', $parent_table.".id")
          ->select($selectable)
          ->where($parent_table.".id", $value)
          ->first();

    }

    static public function _all() {

        
       $selectable = self::_getSelectable();
       $table = self::_getTableName();
       $parent_table = self::_getParentTableName();
       return DB::table($table)
          ->Join($parent_table, $table.".job_id", '=', $parent_table.".id")
          ->select($selectable)        
          ->paginate(100000)
          ->toArray();    

    }

    static public function _create(array $columns) {
        $parent = parent::instance();
        $parent_fillable = $parent->fillable;
        $column['type'] = $parent->type;        
        $parent_columns = array_intersect_key($columns, array_flip($parent_fillable));
        $table_columns = array_diff($columns, $parent_columns);
        $job_id = parent::_create($parent_columns);
        array_push($table_columns, ['job_id'=>$job_id]);
        
        $table = self::_getTableName();
        return DB::table($table)
                 ->insertGetId($columns);

    }

    static public function _update(array $columns) {
         $parent = self::_getParentInstance();         
         $parent_fillable = $parent->fillable;
         array_push($parent_fillable, 'id');
         $column['type'] = $parent->type;
         $parent_columns = array_intersect_key($columns, array_flip($parent_fillable));
         $table_columns = array_diff($columns, $parent_columns);
         $table = self::_getTableName();
         $parent_table = _getParentTableName();
         parent::_update($parent_columns);
         DB::table($table)
           ->where('job_id', $table_columns['job_id'])
           ->update($table_columns);

    }
     static public function getJobsByStatus($status) {
         $selectable = self::_getSelectable();
         $table = self::_getTableName();
         $parent_table = self::_getParentTableName();
         return DB::table($table)
            ->Join($parent_table, $table.".job_id", '=', $parent_table.".id")
            ->select($selectable)
            ->where($parent_table.".status", $status)        
            ->get()
            ->toArray();    

    }

    static public function getJobsByHolder($id) {
         $selectable = self::_getSelectable();
         $table = self::_getTableName();
         $parent_table = self::_getParentTableName();
         return DB::table($table)
            ->Join($parent_table, $table.".job_id", '=', $parent_table.".id")
            ->select($selectable)
            ->where($parent_table.".holder_id", $id)        
            ->get()
            ->toArray(); 

    }

    static public function getJobsByBidStatus($status) {
         $selectable = self::_getSelectable();
         $table = self::_getTableName();
         $parent_table = _getParentTableName();
         return DB::table($table)
            ->Join($parent_table, $table.".job_id", '=', $parent_table.".id")
            ->select($selectable)
            ->where($parent_table.".bid_status", $status)        
            ->get()
            ->toArray(); 

    }

    static public function _destroy($value) {
        return parent::find($value)->delete();
    }

    



}