<?php

namespace App\Models\Floors;

use App\Models\Buildings\Building;
use App\Models\Rooms\Room;
use App\Models\Trks\Trk;
use App\Models\TrksBuildingsFloors\TrkBuildingFloor;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "floors";

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
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

    public function buildings() {
        return $this->belongsToMany(Building::class, 'building_floor_trk');
    }

    public function trks() {
        return $this->belongsToMany(Trk::class)
            ->withPivot('id', 'name')
            ->withTimestamps();
    }
}
