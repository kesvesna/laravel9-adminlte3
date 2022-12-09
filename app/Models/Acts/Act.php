<?php

namespace App\Models\Acts;

use App\Models\Applications\ApplicationRepairAct;
use App\Models\Applications\Applications;
use App\Models\Buildings\Building;
use App\Models\Equipments\Equipment;
use App\Models\Repairs\Repair;
use App\Models\Rooms\Room;
use App\Models\Systems\System;
use App\Models\Traits\Filterable;
use App\Models\Trks\Trk;
use App\Models\User;
use App\Models\WorkTypes\WorkType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Act extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    public const CREATED_BY_PLAN = 1;
    public const CREATED_BY_APPLICATION = 2;

    protected $table = "acts";

    protected $fillable = [
        'date',
        'act_type_id',
        'trk_id',
        'building_id',
        'system_type_id',
        'works',
        'remarks',
        'recommendations',
        'spare_parts',
        'room_id',
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class, 'system_type_id')->withDefault();
    }

    public function act_type()
    {
        return $this->belongsTo(ActTypes::class, 'act_type_id')->withDefault();

    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class, 'room_id')->withDefault();
    }

    public function building(): BelongsTo
    {
        return $this->belongsTo(Building::class, 'building_id')->withDefault();
    }

    public function medias()
    {
        return $this->hasMany(ActMedias::class, 'act_id', 'id');
    }

    public function users()
    {
        return $this->hasManyThrough(
            User::class,
            ActUsers::class,
            'act_id',
            'id',
            'id',
            'user_id'
        );
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

    public function application()
    {
        return $this->hasOneThrough(
            Applications::class,
            ApplicationRepairAct::class,
            'act_id',
            'id',
            'id',
            'application_id'
        );
    }

    public function this_works()
    {
        return $this->hasMany(
            ActWorks::class
        );
    }

    public function equipment()
    {
        return $this->hasOneThrough(
            Equipment::class,
            ActEquipments::class,
            'act_id',
            'id',
            'id',
            'equipment_id'
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
            $equipment->medias()->delete();
        });
    }
}
