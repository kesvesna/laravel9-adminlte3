<?php

namespace App\Models\Equipments;

use App\Models\Acts\Act;
use App\Models\Applications\ApplicationRepairAct;
use App\Models\Buildings\Building;
use App\Models\Floors\Floor;
use App\Models\Rooms\Room;
use App\Models\Systems\System;
use App\Models\Traits\Filterable;
use App\Models\TrkBuildingFloorRooms\TrkBuildingFloorRoom;
use App\Models\Trks\Trk;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "equipments";

    public const IN_OPERATION = 1;
    public const IN_REPAIR = 2;
    public const DISASSEMBLED = 3;
    public const DECOMMISSIONED = 4;

    protected $fillable = [
        'system_type_id',
        'room_id',
        'equipment_name_id'
    ];


    public function system(): BelongsTo
    {
        return $this->belongsTo(System::class, 'system_type_id')->withDefault();
    }

    public function name(): BelongsTo
    {
        return $this->belongsTo(EquipmentNames::class, 'equipment_name_id')->orderBy('name')->withDefault();
    }

    public function room()
    {
        return $this->belongsTo(TrkBuildingFloorRoom::class, 'room_id')->withDefault();
    }

    public function medias()
    {
        return $this->hasMany(EquipmentMedias::class, 'equipment_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(EquipmentHistories::class, 'equipment_id', 'id');
    }

    public function currentHistory()
    {
        return $this->hasOne(EquipmentHistories::class, 'equipment_id')->latest('id');
    }

    public function acts()
    {
        return $this->hasManyThrough(
            Act::class,
            ApplicationRepairAct::class,
            'equipment_id',
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
