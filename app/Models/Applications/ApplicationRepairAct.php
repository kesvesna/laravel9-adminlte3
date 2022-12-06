<?php

namespace App\Models\Applications;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationRepairAct extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "application_repair_act_equipment";

    protected $fillable = [
        'application_id',
        'repair_id',
        'act_id',
        'equipment_id'
    ];
}
