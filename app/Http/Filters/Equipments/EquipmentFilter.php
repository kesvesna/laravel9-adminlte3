<?php

namespace App\Http\Filters\Equipments;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class EquipmentFilter extends AbstractFilter
{
    public const TRK_ID = 'trk_id';
    public const SYSTEM_TYPE_ID = 'system_type_id';

    public const EQUIPMENT_STATUS_ID = 'equipment_status_id';
    public const COMMENT = 'comment';
    public const SERVICE_ID = 'service_id';
    public const ID = 'id';
    public const CREATED_AT = 'created_at';

    protected function getCallbacks(): array
    {
        return [
            self::TRK_ID => [$this, 'trk_id'],
            self::COMMENT => [$this, 'comment'],
            self::ID => [$this, 'id'],
            self::CREATED_AT => [$this, 'created_at'],
            self::SYSTEM_TYPE_ID => [$this, 'system_type_id'],
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

    public function system_type_id(Builder $builder, $value)
    {
        $builder->where('system_type_id', $value);
    }

    public function comment(Builder $builder, $value)
    {
        $builder->where('comment', 'like', "%{$value}%");
    }

    public function created_at(Builder $builder, $value)
    {
        $builder->where('created_at', 'like', "%{$value}%");
    }

}
