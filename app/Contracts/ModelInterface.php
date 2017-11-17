<?php

namespace App\Contracts;

interface ModelInterface
{
     /**
     * Get the a job.
     *
     * @param  integer  $value
     * @return Model
     */
     static public function _find($value);
      /**
     * Get the a paginated jobs.
     *
     * @param  Arra $params [query, limit, orderBy, ascending]
     * @return Array
     */
     static public function _get(Array $params);

    /**
     * Write a Job to database, 
     * @param  array  $columns
     * @return integer $id
     */
    static public function _create(array $columns);

    /**
     * Save a editing job.
     * @param  array  $columns must contain field id
     * @return void
     */
    static public function _update(array $columns);

    /**
     * Get all jobs.
     *
     * @return void
     */
    static public function _all();
   

    // static public function getJobsByStatus($value);

     /**
     * Save a editing job.
     * @param  intger $value 
     * @return array
     */
    // static public function getJobsByHolder($value);

     /**
     * Save a editing job.
     * @param  intger $value 
     * @return array
     */

    // static public function getJobsByBidStatus($value);

    /**
     * 
     *
     * @param  integer  $value
     * @return void
     */
   
    
   
 
}
