<?php

namespace App\Models\Repairs;

use App\Models\Acts\Act;
use App\Models\Applications\ApplicationRepairAct;
use App\Models\Applications\Applications;
use App\Models\Trks\Trk;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Repair extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    public const BY_PLAN = 1;
    public const BY_APPLICATION = 2;
    public const IN_PROGRESS = 3;
    public const DONE = 4;
    public const REJECTED = 5;
    public const DELETED = 6;
    public const RESPONSIBLE_USER = 7;

    protected $table = "repairs";

    protected $fillable = [
        'trk_id',
        'comment',
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function medias()
    {
        return $this->hasMany(RepairMedias::class, 'repair_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(RepairHistories::class, 'repair_id', 'id');
    }

    public function currentHistory()
    {
        return $this->hasOne(RepairHistories::class, 'repair_id')->latest('id');
    }

    public function application()
    {
        return $this->hasOneThrough(
            Applications::class,
            ApplicationRepairAct::class,
            'repair_id',
            'id',
            'id',
            'application_id'
        );
    }

    public function acts()
    {
        return $this->hasManyThrough(
            Act::class,
            ApplicationRepairAct::class,
            'repair_id',
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

    public static function boot() {
        parent::boot();

        static::deleting(function($equipment) {
            $equipment->histories()->delete();
            $equipment->medias()->delete();
        });
    }
}
