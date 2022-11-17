<?php

namespace App\Models\Repairs;

use App\Models\Applications\Applications;
use App\Models\Services\Service;
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

    protected $table = "repairs";

    protected $fillable = [
        'trk_id',
        'application_id',
        'repair_status_id',
        'service_id',
        'comment',
        'user_id'
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function application(): BelongsTo
    {
        return $this->belongsTo(Applications::class)->withDefault();
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class)->withDefault();
    }

    public function media()
    {
        return $this->hasMany(RepairMedias::class, 'repair_id', 'id');
    }

    public function history()
    {
        return $this->hasMany(RepairHistories::class, 'repair_id', 'id');
    }

    public function repair_status(): BelongsTo
    {
        return $this->belongsTo(RepairStatuses::class)->withDefault();
    }

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }

    public function setStatusId(int $repair_status_id)
    {
        $this->repair_status_id = $repair_status_id;
    }
}
