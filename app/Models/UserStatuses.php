<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserStatuses extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "user_statuses";

    protected $fillable = [
        'name',
        'slug',
        'sort_order'
    ];

    public function users(): HasMany
    {
        return $this->hasMany(User::class, 'user_status_id', 'id');
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
