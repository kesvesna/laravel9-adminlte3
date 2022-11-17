<?php

namespace App\Models\Repairs;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RepairMedias extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "repair_medias";

    protected $fillable = [
        'name',
        'repair_id',
        'sort_order',
    ];

    public function repair()
    {
        return $this->belongsTo(Repair::class, 'repair_id', 'id');
    }
}
