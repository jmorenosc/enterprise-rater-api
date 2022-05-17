<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyStep extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;
    protected $hidden = [
        // 'pivot'
    ];

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'order',
        'parent_id'
    ];

    public function Parent()
    {
        return $this -> hasMany(SurveyStep::class,'has_step');
    }
    
    public function Childrens()
    {
        return $this -> belongsToMany(SurveyStep::class, 'has_step', 'parent_id')
        ->withPivot(['id']);
    }

    public function Surveys()
    {
        return $this -> morphTo(Survey::class, 'surveyable');
    }

    public function Questions()
    {
        return $this -> morphToMany(Question::class, 'questionable')
            -> withPivot(['position']);
    }
}
