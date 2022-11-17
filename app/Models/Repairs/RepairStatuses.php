<?php

namespace App\Models\Repairs;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairStatuses extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "application_statuses";

    protected $fillable = [
        'name',
        'slug'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Repair::class, 'application_status_id', 'id');
    }

    public function histories(): HasMany
    {
        return $this->hasMany(RepairHistories::class, 'application_status_id', 'id');
    }

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
