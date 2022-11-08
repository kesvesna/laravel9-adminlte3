<?php

namespace App\Models\TrksBuildings;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrkBuilding extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "building_trk";

    protected $fillable = [
        'trk_id',
        'building_id'
    ];
}
