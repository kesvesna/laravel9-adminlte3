<?php

namespace App\Models\Acts;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActStatuses extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sluggable;

    protected $table = "act_types";

    protected $fillable = [
        'name',
        'slug',
        'sort_order'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Act::class, 'act_status_id', 'id');
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
