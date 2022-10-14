<?php

namespace App\Models\Towns;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Town extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "towns";

    protected $fillable = [
        'name',
        'slug'
    ];
}
