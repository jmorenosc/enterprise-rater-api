<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedSurvey extends Model
{
    use HasFactory;

    public $timestamps = true;

    /**
     * Array to handle properies can be setted on model instance
     * @var array
     */
    protected $fillable = [
        'data',
        'enterprise_id',
        'survey_id',
    ];

    public function getDataAttribute($val)
    {
        return json_decode($val);
    }

    public function Enterprise()
    {
        return $this -> belongsTo(Enterprise::class);
    }
    
    public function Survey()
    {
        return $this -> belongsTo(Survey::class);
    }
}
