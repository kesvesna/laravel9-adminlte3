<?php

namespace App\Http\Filters\Trks;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class TrksFilter extends AbstractFilter
{
    public const TRK_ID = 'trk_id';
    public const BUILDING_ID = 'building_id';
    public const FLOOR_ID = 'floor_id';
    public const ROOM_ID = 'room_id';
    public const ID = 'id';
    public const CREATED_AT = 'created_at';

    protected function getCallbacks(): array
    {
        return [
            self::TRK_ID => [$this, 'trk_id'],
            self::BUILDING_ID => [$this, 'building_id'],
            self::FLOOR_ID => [$this, 'floor_id'],
            self::ROOM_ID => [$this, 'room_id'],
            self::ID => [$this, 'id'],
            self::CREATED_AT => [$this, 'created_at'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function trk_id(Builder $builder, $value)
    {
        $builder->where('trk_id', $value);
    }

    public function created_at(Builder $builder, $value)
    {
        $builder->where('created_at', 'like', "%{$value}%");
    }

    public function building_id(Builder $builder, $value)
    {
        $builder->where('building_id', $value);
    }

    public function floor_id(Builder $builder, $value)
    {
        $builder->where('floor_id', $value);
    }

    public function room_id(Builder $builder, $value)
    {
        $builder->where('room_id', $value);
    }
}
