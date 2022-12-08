<?php

namespace App\Models\Acts;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActTypes extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "act_types";

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'visible',
    ];

}
