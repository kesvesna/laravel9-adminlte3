<?php

namespace App\Models\Acts;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ActMedias extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "act_medias";

    protected $fillable = [
        'name',
        'act_id',
        'sort_order',
    ];

    public function act()
    {
        return $this->belongsTo(Act::class, 'act_id', 'id');
    }
}
