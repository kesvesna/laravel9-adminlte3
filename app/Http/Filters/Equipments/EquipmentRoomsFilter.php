<?php

namespace App\Http\Filters\Equipments;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class EquipmentRoomsFilter extends AbstractFilter
{
    public const ROOM_NAME = 'room_id';


    protected function getCallbacks(): array
    {
        return [
            self::ROOM_NAME => [$this, 'room_id'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function room_id(Builder $builder, $value)
    {
        $builder->where('name', 'like', '%' . $value . '%');
    }
}
