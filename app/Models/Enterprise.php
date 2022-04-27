<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    /**
     * Data to fill on model instance
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    
    /**
     * Data to fill on model instance
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
