<?php
namespace App\Models;
use App\Models\Job;
use App\Traits\ModelTrait;
use App\Traits\Jobs\SubJobTrait;
use App\Contracts\Jobs\SubJobInterface;

class Project extends Job implements SubJobInterface{

    protected  $table = 'projects';
    protected  $fillable = [
        'job_id',
        'client_id',
        'nation_abbr',
        'industry_abbr',
        'description'
    ];
    protected $type = 'Project';
    protected static function instance() {
        return new Project();
    }
    public $timestamps = false;

  
    use SubJobTrait;
}