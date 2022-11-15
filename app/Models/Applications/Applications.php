<?php

namespace App\Models\Applications;

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

    protected $table = "applications";

    protected $fillable = [
        'trk_id',
        'application_status_id',
        'service_id',
        'notify_author',
        'comment',
        'user_id'
    ];

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

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
