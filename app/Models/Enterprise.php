<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * Data to fill on model instance
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'rfc',
        'business_name'
    ];
    
    /**
     * Data to fill on model instance
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function Surveys()
    {
        return $this -> MorphToMany(Survey::class, 'Surveyable');
    }
}
