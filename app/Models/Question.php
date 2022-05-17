<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'impact',
        'type',
        'multiple',
        'required'
    ];

    public function SurveySteps()
    {
        return $this -> morphedByMany(SurveyStep::class, 'questionable')
            -> withPivot(['position']);
    }
}
