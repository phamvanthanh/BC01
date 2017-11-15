<?php
namespace App\Models;
use App\Models\Job;
use App\Traits\Jobs\SubJobTrait;
use App\Contracts\Jobs\SubJobInterface;

class Package extends Job implements SubJobInterface{

    protected  $table = 'packages';
    protected  $fillable = [
        'job_id',
        'section_id'        
    ];
    protected $type = 'Package';
    protected static function instance() {
        return new Package();
    }
    public $timestamps = false;


    use SubJobTrait;
}