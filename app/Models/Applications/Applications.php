<?php

namespace App\Models\Applications;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applications extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "applications";

    protected $fillable = [
        'trk_id',
        'comment'
    ];

}
