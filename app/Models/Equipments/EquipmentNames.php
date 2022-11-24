<?php

namespace App\Models\Equipments;

use App\Models\Services\Service;
use App\Models\Traits\Filterable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentNames extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "equipment_names";

    protected $fillable = [
        'name',
        'slug',
    ];

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
