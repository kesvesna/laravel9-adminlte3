<?php

namespace App\Models\Equipments;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentAct extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "equipment_act";

    protected $fillable = [
        'equipment_id',
        'act_id'
    ];
}
