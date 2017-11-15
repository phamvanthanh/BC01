<?php

namespace App\Contracts\Jobs;

interface SubJobInterface
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

     static public function getJobsByStatus($value);

     /**
     * Save a editing job.
     * @param  intger $value 
     * @return array
     */
    static public function getJobsByHolder($value);

     /**
     * Save a editing job.
     * @param  intger $value 
     * @return array
     */

    static public function getJobsByBidStatus($value);

    /**
     * 
     *
     * @param  integer  $value
     * @return void
     */
    static public function _destroy($value);
    

}