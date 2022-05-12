<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SurveyStep extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = true;

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
        return $this -> belongsTo(SurveyStep::class);
    }
    
    public function Childrens()
    {
        return $this -> hasMany(SurveyStep::class, 'parent_id');
    }
}
