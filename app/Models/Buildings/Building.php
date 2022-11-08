<?php

namespace App\Models\Buildings;

use App\Models\Trks\Trk;
use App\Models\TrksBuildings\TrkBuilding;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "buildings";

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

    /**
     * The trks that belong to the building.
     */
    public function trks()
    {
        return $this->belongsToMany(Trk::class);
    }
}
