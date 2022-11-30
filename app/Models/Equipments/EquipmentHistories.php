<?php

namespace App\Models\Equipments;

use App\Models\Services\Service;
use App\Models\Systems\System;
use App\Models\Traits\Filterable;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentHistories extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "equipment_histories";

    protected $fillable = [
        'equipment_id',
        'equipment_status_id',
        'created_by_user_id',
        'comment',

    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'id');
    }

    public function equipment_status(): BelongsTo
    {
        return $this->belongsTo(EquipmentStatuses::class)->withDefault();
    }

    public function created_by_user()
    {
        return $this->belongsTo(User::class, 'created_by_user_id', 'id')->withDefault();
    }
}
