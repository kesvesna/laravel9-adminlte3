<?php

namespace App\Models\Applications;

use App\Models\Acts\Act;
use App\Models\Repairs\Repair;
use App\Models\User;
use App\Models\Trks\Trk;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applications extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    public const NEW = 1;
    public const IN_PROGRESS = 2;
    public const REPAIR = 3;
    public const DONE = 4;
    public const IN_WORK = 5;
    public const REJECTED = 6;
    public const DELETED = 7;
    public const REDIRECTED = 8;
    public const RESPONSIBLE_USER = 9;

    protected $table = "applications";

    protected $fillable = [
        'trk_id',
        'notify_author',
        'comment'
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function medias()
    {
        return $this->hasMany(ApplicationMedias::class, 'application_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(ApplicationHistories::class, 'application_id', 'id');
    }

    public function currentHistory()
    {
        return $this->hasOne(ApplicationHistories::class, 'application_id')->latest('id');
    }

    public function repairs()
    {
        return $this->hasManyThrough(
            Repair::class,
            ApplicationRepairAct::class,
            'application_id',
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
            'application_id',
            'id',
            'id',
            'act_id'
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
