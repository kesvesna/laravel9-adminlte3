<?php

namespace App\Models\Rooms;

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
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "rooms";

    protected $fillable = [
        'name',
        'slug',
        'trk_id',
        'building_id',
        'floor_id'
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

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class)->withDefault();
    }

    public function floor(): BelongsTo
    {
        return $this->belongsTo(Floor::class)->withDefault();
    }
}
