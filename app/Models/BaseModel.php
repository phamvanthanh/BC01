<?php

namespace App\Models;


abstract class BaseModel {

    protected $table;
    protected $fillable = [];
    public $timestamps = false;
    protected $hidden = [];

    abstract static public function find( $value);
    abstract static public function get(Array $params);
    abstract static public function all();
    abstract static public function create(Array $columns);
    abstract static public function update(Array $colums);  
    abstract static public function delete($value);
    abstract static public function _getAttribute();
    
}