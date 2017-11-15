<?php
namespace App\Models;
use App\Models\Job;
use App\Traits\Jobs\SubJobTrait;
use App\Contracts\Jobs\SubJobInterface;

class Section extends Job implements SubJobInterface{

    protected  $table = 'sections';
    protected  $fillable = [
        'job_id',
        'project_id'
    ];
    protected $type = 'Section';
    protected static function instance() {
        return new Section();
    }
    public $timestamps = false;


    use SubJobTrait;
}