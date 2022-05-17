<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Array to handle properies can be setted on model instance
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    /**
     * Method to handle polymorphic relation
     * @method Surveyable
     */
    public function SurveySteps()
    {
        return $this -> morphedByMany(SurveyStep::class, 'surveyable');
    }
}
