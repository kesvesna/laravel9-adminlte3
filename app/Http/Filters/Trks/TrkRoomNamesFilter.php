<?php

namespace App\Http\Filters\Trks;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class TrkRoomNamesFilter extends AbstractFilter
{
    public const ROOM_NAME = 'room_name';


    protected function getCallbacks(): array
    {
        return [
            self::ROOM_NAME => [$this, 'room_name'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function room_name(Builder $builder, $value)
    {
        $builder->where('name', 'like', '%' . $value . '%');
    }
}
