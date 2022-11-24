<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserMedias extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "user_medias";

    protected $fillable = [
        'name',
        'user_id',
        'sort_order',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
