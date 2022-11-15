<?php

namespace App\Models\Applications;

use App\Models\ApplicationHistories\ApplicationHistories;
use App\Models\ApplicationMedias\ApplicationMedias;
use App\Models\Services\Service;
use App\Models\ApplicationStatuses\ApplicationStatuses;
use App\Models\Trks\Trk;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applications extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    public const NEW = 1;
    public const IN_PROGRESS = 2;

    protected $table = "applications";

    protected $fillable = [
        'trk_id',
        'application_status_id',
        'service_id',
        'notify_author',
        'comment',
        'user_id'
    ];

    public function accept(ApplicationHistories $history)
    {
        $this->application_status_id = $this::IN_PROGRESS;
        $this->save();

        $history->application_id = $this->id;
        $history->application_status_id = $this->application_status_id;
        $history->user_id = 1;
        $history->service_id = $this->service_id;
        $history->trk_id = $this->trk_id;
        $history->save();
    }

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function application_status(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatuses::class)->withDefault();
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class)->withDefault();
    }

    public function media()
    {
        return $this->hasMany(ApplicationMedias::class, 'application_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(ApplicationHistories::class, 'application_id', 'id');
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
