<?php

namespace App\Models\TrkBuildingFloorRooms;

use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Rooms\Room;
use App\Models\Traits\Filterable;
use App\Models\Trks\Trk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrkBuildingFloorRoom extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "trk_building_floor_room";

    protected $fillable = [
        'trk_id',
        'building_id',
        'floor_id',
        'room_id'
    ];

    /**
     * The buildings that belong to the trk.
     */
    public function building()
    {
        return $this->belongsTo(Building::class, 'building_id');
    }

    public function trk()
    {
        return $this->belongsTo(Trk::class, 'trk_id');
    }

    public function floor()
    {
        return $this->belongsTo(Floor::class, 'floor_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }

}
