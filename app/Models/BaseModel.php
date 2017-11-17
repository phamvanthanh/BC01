<?php
namespace App\Models;

abstract class BaseModel {

    protected $table;
    protected $fillable = [];
    protected $timestamps = false;
    protected $hidden = [];

    abstract static public function _find( $value);
    abstract static public function _get(Array $params);
    abstract static public function _all();
    abstract static public function _create(Array $columns);
    abstract static public function _update(Array $colums);  
    abstract static public function _delete($value);
    abstract static public function _getAttribute();
    
}