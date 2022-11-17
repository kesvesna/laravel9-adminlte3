<?php

namespace App\Models\Towns;

use App\Models\Repairs\Repair;
use App\Models\Trks\Building;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Town extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "towns";

    protected $fillable = [
        'name',
        'slug'
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
        return $this->hasMany(Building::class, 'town_id', 'id');
    }
}
