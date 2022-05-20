<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionResponse extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'title',
        'value'
    ];

    /**
     * @var bool
     */
    public $timestamps = true;

    public function Questions()
    {
        return $this -> belongsToMany(Question::class, 'question_question_responses')
        -> withPivot([ 'position' ]);
    }
}
