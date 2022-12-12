<?php

namespace App\Models\Equipments;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentStatuses extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sluggable;

    protected $table = "equipment_statuses";

    protected $fillable = [
        'name',
        'slug',
        'sort_order'
    ];

    public function equipments(): HasMany
    {
        return $this->hasMany(Equipment::class, 'equipment_status_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(EquipmentHistories::class, 'equipment_status_id', 'id');
    }

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }


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
