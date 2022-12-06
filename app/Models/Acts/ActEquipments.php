<?php

namespace App\Models\Acts;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActEquipments extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "act_equipments";

    protected $fillable = [
        'equipment_id',
        'act_id',
        'visible',
    ];

    public function act()
    {
        return $this->belongsTo(Act::class, 'act_id', 'id');
    }
}
