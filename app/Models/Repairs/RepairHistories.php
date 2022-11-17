<?php

namespace App\Models\Repairs;

use App\Models\Services\Service;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairHistories extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "repair_histories";

    protected $fillable = [
        'repair_id',
        'application_id',
        'repair_status_id',
        'user_id',
        'service_id',
        'comment',
        'trk_id'
    ];

    public function application()
    {
        return $this->belongsTo(Repair::class, 'application_id', 'id');
    }

    public function repair_status(): BelongsTo
    {
        return $this->belongsTo(RepairStatuses::class)->withDefault();
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class)->withDefault();
    }
}
