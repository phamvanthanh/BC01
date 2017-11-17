<?php
namespace App\Models;

abstract class Model {

    static protected $table;
    static protected $fillable;
    static protected $timestamps;
    static protected $hidden;

    abstract protected function _find( $value);
    abstract protected function _get(Array $params);
    abstract protected function _all();
    abstract protected function _create(Array $columns);
    abstract protected function _update(Array $colums);  
    abstract protected function _delete($value);
    abstract protected function _geAttribute();
    
}