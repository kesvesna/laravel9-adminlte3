<?php

namespace App\Models\Rooms;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomTypes extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "room_types";

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'visible',
    ];

}
