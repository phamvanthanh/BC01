<?php

namespace App\Contracts;

interface JobInterface
{
     static public function _getParentTableName();

     static public function _getParentInstance();
     
     static public function _getSelectable();

    /**
     * Save a editing job.
     * @param  string $value ('active' / 'finished' / 'pending' )
     * @return array
     */
        
    // Extend methods and properties from job

     static public function _getJobsByStatus($value);

     /**
     * Save a editing job.
     * @param  intger $value 
     * @return array
     */
    static public function _getJobsByHolder($value);

     /**
     * Save a editing job.
     * @param  intger $value 
     * @return array
     */

    static public function _getJobsByBidStatus($value);

    /**
     * 
     *
     * @param  integer  $value
     * @return void
     */
    static public function _destroy($value);
    

}