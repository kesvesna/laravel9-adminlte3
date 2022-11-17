<?php

namespace App\Models\Repairs;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairServices extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "repair_services";

    protected $fillable = [
        'name',
        'slug'
    ];

    public function repairs(): HasMany
    {
        return $this->hasMany(Repair::class, 'service_id', 'id');
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
