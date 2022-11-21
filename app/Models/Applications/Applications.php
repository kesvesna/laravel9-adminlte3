<?php

namespace App\Models\Applications;

use App\Models\User;
use App\Models\Trks\Trk;
use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Applications extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    public const NEW = 1;
    public const IN_PROGRESS = 2;
    public const REPAIR = 3;
    public const DONE = 4;
    public const REJECTED = 5;
    public const DELETED = 6;
    public const REDIRECTED = 7;
    public const RESPONSIBLE_USER = 8;

    protected $table = "applications";

    protected $fillable = [
        'trk_id',
        'notify_author',
        'comment',
        'user_id'
    ];

    public function trk(): BelongsTo
    {
        return $this->belongsTo(Trk::class)->withDefault();
    }

    public function medias()
    {
        return $this->hasMany(ApplicationMedias::class, 'application_id', 'id');
    }

    public function histories()
    {
        return $this->hasMany(ApplicationHistories::class, 'application_id', 'id');
    }

    public function currentHistory()
    {
        return $this->hasOne(ApplicationHistories::class, 'application_id')->latest('id');
    }

    protected function removeQueryParam(string ...$keys)
    {
        foreach($keys as $key)
        {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
