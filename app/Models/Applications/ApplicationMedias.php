<?php

namespace App\Models\Applications;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ApplicationMedias extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $table = "application_medias";

    protected $fillable = [
        'name',
        'application_id',
        'sort_order',
    ];

    public function application()
    {
        return $this->belongsTo(Applications::class, 'application_id', 'id');
    }
}
