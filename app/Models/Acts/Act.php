<?php

namespace App\Models\Acts;

use App\Models\Applications\ApplicationRepairAct;
use App\Models\Repairs\Repair;
use App\Models\Traits\Filterable;
use App\Models\Trks\Trk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Act extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "acts";

    protected $fillable = [
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function medias()
    {
        return $this->hasMany(ActMedias::class, 'application_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(ActHistories::class, 'application_id', 'id');
    }

    public function currentHistory()
    {
        return $this->hasOne(ActHistories::class, 'application_id')->latest('id');
    }

    public function repairs()
    {
        return $this->hasManyThrough(
            Repair::class,
            ApplicationRepairAct::class,
            'act_id',
            'id',
            'id',
            'id'
        );
    }

    public function acts()
    {
        return $this->hasManyThrough(
            Act::class,
            ApplicationRepairAct::class,
            'act_id',
            'id',
            'id',
            'id'
        );
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
