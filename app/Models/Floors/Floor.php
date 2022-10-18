<?php

namespace App\Models\Buildings;

use App\Models\Trks\Trk;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Floor extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "floors";

    protected $fillable = [
        'name',
        'slug',
        'trk_id'
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

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }
}
