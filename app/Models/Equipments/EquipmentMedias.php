<?php

namespace App\Models\Equipments;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EquipmentMedias extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "equipment_medias";

    protected $fillable = [
        'name',
        'equipment_id',
        'sort_order',
    ];

    public function equipment()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id', 'id');
    }
}
