<?php
namespace App\Models;
use App\Models\Job;
use App\Traits\SpecializedJobTrait;
use App\Contracts\JobInterface;

class Section extends Job implements JobInterface{

    static protected  $table = 'sections';
    static protected  $fillable = [
        'job_id',
        'project_id'
    ];
    static protected $type = 'Section';
    static protected function instance() {
        return new Section();
    }
    static protected $timestamps = false;

    use SpecializedJobTrait;
}