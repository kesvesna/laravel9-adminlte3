<?php

namespace App\Models\WorkTypes;

use App\Models\Acts\Act;
use App\Models\Acts\ActWorks;
use App\Models\Acts\ActWorkSpareParts;
use App\Models\SpareParts\SparePart;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WorkType extends Model
{
    use HasFactory, SoftDeletes, Sluggable;

    protected $table = "work_types";

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['name']
            ]
        ];
    }

    public function act(){
        return $this->hasOneThrough(
            Act::class,
            ActWorks::class,
            'work_type_id',
            'id',
            'id',
            'act_id'
        );
    }
}
