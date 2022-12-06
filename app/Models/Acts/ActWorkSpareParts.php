<?php

namespace App\Models\Acts;

use App\Models\SpareParts\SparePart;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActWorkSpareParts extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "act_work_spare_parts";

    protected $fillable = [
        'act_work_id',
        'spare_part_id',
        'count',
        'model',
        'comment',
        'visible'
    ];

    public function one_spare_part()
    {
        return $this->belongsTo(SparePart::class, 'spare_part_id', 'id');
    }
}
