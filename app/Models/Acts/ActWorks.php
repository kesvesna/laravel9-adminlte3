<?php

namespace App\Models\Acts;

use App\Models\SpareParts\SparePart;
use App\Models\Traits\Filterable;
use App\Models\WorkTypes\WorkType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActWorks extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "act_works";

    protected $fillable = [
        'work_id',
        'act_id',
        'sort_order',
    ];

    public function act()
    {
        return $this->belongsTo(Act::class, 'act_id', 'id');
    }

    public function spare_parts()
    {
        return $this->hasManyThrough(
            ActWorkSpareParts::class,
            ActWorks::class,
            'id',
            'act_work_id',
            'id',
            'id'
        );
    }

    public function work_type()
    {
        return $this->hasMany(
            WorkType::class, 'id', 'work_id'
        );
    }
}
