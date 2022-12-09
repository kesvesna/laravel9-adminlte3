<?php

namespace App\Models\Rooms;

use App\Models\Traits\Filterable;
use App\Models\TrkBuildingFloorRooms\TrkBuildingFloorRoom;
use App\Models\Trks\Trk;
use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes, Sluggable, Filterable;

    protected $table = "rooms";

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'room_type_id',
        'room_status_id',
        'comment',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {

        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function buildings()
    {
        return $this->hasManyThrough(
            Building::class,
            TrkBuildingFloorRoom::class,
            'building_id',
            'id',
            'id',
            'id'
        );
    }

    public function room_type()
    {
        return $this->belongsTo(RoomTypes::class, 'room_type_id')->withDefault();

    }

    public function room_status()
    {
        return $this->belongsTo(RoomStatuses::class, 'room_status_id')->withDefault();

    }
}
