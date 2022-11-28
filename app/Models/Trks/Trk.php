<?php

namespace App\Models\Trks;

use App\Models\Applications\Applications;
use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Repairs\Repair;
use App\Models\Rooms\Room;
use App\Models\Towns\Town;
use App\Models\TrkBuildingFloorRooms\TrkBuildingFloorRoom;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Trk extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    //use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $table = "trks";

    protected $fillable = [
        'name',
        'slug',
        'town_id'
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
                'source' => 'name'
            ]
        ];
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Applications::class, 'trk_id', 'id');
    }

    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class, 'trk_id', 'id');
    }

    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class)->withDefault();
    }

    /**
     * The buildings that belong to the trk.
     */
    public function buildings()
    {
        return $this->belongsToMany(Building::class);
    }

    public function architectures()
    {
        return DB::table('trk_building_floor_room')
            ->join('buildings', 'trk_building_floor_room.building_id', '=', 'buildings.id')
            ->join('floors', 'trk_building_floor_room.floor_id', '=', 'floors.id')
            ->join('rooms', 'trk_building_floor_room.room_id', '=', 'rooms.id')
            ->select('trk_building_floor_room.*', 'rooms.name as room_name', 'floors.name as floor_name', 'buildings.name as building_name')
            ->where('trk_id', '=', $this->id)
            ->where('trk_building_floor_room.deleted_at', '=', null)
            ->get();
    }
}
