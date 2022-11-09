<?php

namespace App\Models\TrksBuildingsFloors;

use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Trks\Trk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrkBuildingFloor extends Pivot
{
    use HasFactory, SoftDeletes;

    protected $table = "building_floor_trk";

    protected $fillable = [
        'trk_id',
        'building_id',
        'floor_id'
    ];

    public function building() {
        return $this->belongsToMany(Building::class, 'building_floor_trk');
    }

    public function floor() {
        return $this->belongsToMany(Floor::class, 'building_floor_trk');
    }

    public function trk() {
        return $this->belongsToMany(Trk::class, 'building_floor_trk');
    }
}
