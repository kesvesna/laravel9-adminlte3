<?php

namespace App\Models\Applications;

use App\Models\Traits\Filterable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationStatuses extends Model
{
    use HasFactory, SoftDeletes, Filterable, Sluggable;

    protected $table = "application_statuses";

    protected $fillable = [
        'name',
        'slug',
        'sort_order'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Applications::class, 'application_status_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(ApplicationHistories::class, 'application_status_id', 'id');
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
