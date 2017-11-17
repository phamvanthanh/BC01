<?php
namespace App\Models;
use App\Traits\SpecializedJobTrait;

  class Project extends Model {

   protected  $table = 'projects';
   protected  $fillable = [
        'job_id',
        'client_id',
        'nation_abbr',
        'industry_abbr',
        'description'
    ];
  protected $type = 'Project';
  protected $timestamps = false;
 

  use SpecializedJobTrait;
}