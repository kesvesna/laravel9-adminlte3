<?php

namespace App\Models\Rooms;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoomStatuses extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sluggable;

    protected $table = "room_statuses";

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'visible',
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

}
