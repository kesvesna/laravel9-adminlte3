<?php

namespace App\Models\Applications;

use App\Models\Services\Service;
use App\Models\Traits\Filterable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationHistories extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "application_histories";

    protected $fillable = [
        'application_id',
        'application_status_id',
        'user_id',
        'service_id',
        'comment',
        'responsible_user_id',
    ];

    public function application()
    {
        return $this->belongsTo(Applications::class, 'application_id', 'id');
    }

    public function application_status(): BelongsTo
    {
        return $this->belongsTo(ApplicationStatuses::class)->withDefault();
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id', 'id')->withDefault();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id')->withDefault();
    }

    public function responsible_user()
    {
        return $this->belongsTo(User::class, 'responsible_user_id', 'id')->withDefault();
    }
}
