<?php 
namespace App\Traits;
// use App\Traits\ModelTrait;
use App\Models\Job;
use DB;
 
trait SpecializedJobTrait {
   

    static public function _getJobInstance() {
        return Job::_getInstance();
    }

    static public function _getJobTableName() {
        return Job::_getTableName();
    }

    static public function _getJobAttribute() {
        return Job::_getAttribute(); 
    }
   
    static public function _getAttribute() {
        $instance = self::_getInstance(); 
        $job_table = self::_getJobTableName();
        $parent_selectable = self::_getJobAttribute();     
     
        $selectable = $instance->fillable;
        $table = self::_getTableName();

        $selectable  = array_map( function($e) use($table){
            return $table.".".$e;
        }, $selectable);

        return array_merge($parent_selectable, $selectable);
    }
    static protected function _buildJoinedTable() {
   
          $table = self::_getTableName();
          $job_table = self::_getJobTableName();
          return 'DB::table("'.$table.'")->join("'.$job_table.'","'.$table.'.job_id","'.$job_table.'.id")';

    }
    static public function _find($value) {
      
       $selectable = self::_getAttribute();
       $table = self::_getTableName();
       $job_table = self::_getJobTableName();
       return DB::table($table)
          ->Join($job_table, $table.".job_id", '=', $job_table.".id")
          ->select($selectable)
          ->where($job_table.".id", $value)
          ->first();

    }
    
    static public function _all() {

        
       $selectable = self::_getAttribute();
       $table = self::_getTableName();
       $job_table = self::_getJobTableName();
       return DB::table($table)
          ->Join($job_table, $table.".job_id", '=', $job_table.".id")
          ->select($selectable)        
          ->get()
          ->toArray();    

    }

    static public function _create(array $columns) {
        $parent = Job::getInstance();
        $parent_fillable = $parent->fillable;
        $column['type'] = $parent->type;        
        $parent_columns = array_intersect_key($columns, array_flip($parent_fillable));
        $table_columns = array_diff($columns, $parent_columns);
        $job_id = Job::_create($parent_columns);
        array_push($table_columns, ['job_id'=>$job_id]);
        
        $table = self::_getTableName();
        return DB::table($table)
                 ->insertGetId($columns);

    }

    static public function _update(array $columns) {
         $parent = self::_getJobInstance();         
         $parent_fillable = $parent->fillable;
         array_push($parent_fillable, 'id');
         $column['type'] = $parent->type;
         $parent_columns = array_intersect_key($columns, array_flip($parent_fillable));
         $table_columns = array_diff($columns, $parent_columns);
         $table = self::_getTableName();
         $job_table = _getJobTableName();
         Job::_update($parent_columns);
         DB::table($table)
           ->where('job_id', $table_columns['job_id'])
           ->update($table_columns);

    }
     static public function _getJobsByStatus($status) {
         $selectable = self::_getAttribute();
         $table = self::_getTableName();
         $job_table = self::_getJobTableName();
         return DB::table($table)
            ->Join($job_table, $table.".job_id", '=', $job_table.".id")
            ->select($selectable)
            ->where($job_table.".status", $status)        
            ->get()
            ->toArray();    

    }

    static public function _getJobsByHolder($id) {
         $selectable = self::_getAttribute();
         $table = self::_getTableName();
         $job_table = self::_getJobTableName();
         return DB::table($table)
            ->Join($job_table, $table.".job_id", '=', $job_table.".id")
            ->select($selectable)
            ->where($job_table.".holder_id", $id)        
            ->get()
            ->toArray(); 

    }

    static public function _getJobsByBidStatus($status) {
         $selectable = self::_getAttribute();
         $table = self::_getTableName();
         $job_table = _getJobTableName();
         return DB::table($table)
            ->Join($job_table, $table.".job_id", '=', $job_table.".id")
            ->select($selectable)
            ->where($job_table.".bid_status", $status)        
            ->get()
            ->toArray(); 

    }

    static public function _delete($value) {
        return Job::delete($value);
    }

    



}