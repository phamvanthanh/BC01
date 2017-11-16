<?php
namespace App\Models;
use App\Models\Job;
use App\Traits\ModelTrait;
use App\Traits\JobTrait;
use App\Contracts\JobInterface;

class Project extends Job implements JobInterface{

   static protected  $table = 'projects';
   static protected  $fillable = [
        'job_id',
        'client_id',
        'nation_abbr',
        'industry_abbr',
        'description'
    ];
  static protected $type = 'Project';
    protected static function instance() {
        return new Project();
    }
  static protected $timestamps = false;

  
    use JobTrait;
}