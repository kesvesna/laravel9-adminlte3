<?php

namespace App\Models\Trks;

use App\Models\Applications\Applications;
use App\Models\Towns\Town;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trk extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "trks";

    protected $fillable = [
        'name',
        'slug',
        'town_id'
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
        return $this->hasMany(Applications::class, 'trk_id', 'id');
    }

    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class)->withDefault();
    }
}
