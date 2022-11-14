<?php

namespace App\Models\ApplicationServices;

use App\Models\Applications\Applications;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationServices extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "application_services";

    protected $fillable = [
        'name',
        'slug'
    ];

    public function applications(): HasMany
    {
        return $this->hasMany(Applications::class, 'service_id', 'id');
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
