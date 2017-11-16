<?php
namespace App\Models;
use App\Models\Job;
use App\Traits\JobTrait;
use App\Contracts\JobInterface;

class Package extends Job implements JobInterface{

    static protected  $table = 'packages';
    static protected  $fillable = [
        'job_id',
        'section_id'        
    ];
    static protected $type = 'Package';
    static protected function instance() {
        return new Package();
    }
    static protected $timestamps = false;

    use JobTrait;
}