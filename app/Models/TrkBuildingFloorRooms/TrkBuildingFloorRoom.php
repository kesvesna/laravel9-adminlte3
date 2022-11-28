<?php

namespace App\Models\TrkBuildingFloorRooms;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrkBuildingFloorRoom extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "trk_building_floor_room";

    protected $fillable = [
        'trk_id',
        'building_id',
        'floor_id',
        'room_id'
    ];


}
