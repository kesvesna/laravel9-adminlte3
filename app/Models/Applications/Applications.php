<?php

namespace App\Models\Applications;

use App\Models\Trks\Trk;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applications extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "applications";

    protected $fillable = [
        'trk_id',
        'comment'
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
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
