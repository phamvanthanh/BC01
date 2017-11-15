<?php 
namespace App\Traits;

trait ModelTrait {
     
     static public function _getInstance() {
        return self::instance();
     }
     static public function _getTableName() {
        return self::_getInstance()->table;
     }

     static public function _getFillable() {
        return self::_getInstance()->fillable;
     }
     
     static public function _getSelectable() {
        $selectable = self::_getFillable();
        array_unshift($selectable, 'id', 'created_at', 'updated_at');
        return $selectable;
     }
}