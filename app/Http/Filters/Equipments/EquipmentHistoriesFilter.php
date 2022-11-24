<?php

namespace App\Http\Filters\Equipments;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class EquipmentHistoriesFilter extends AbstractFilter
{
    public const EQUIPMENT_STATUS_ID = 'equipment_status_id';
    public const SERVICE_ID = 'service_id';

    protected function getCallbacks(): array
    {
        return [
            self::EQUIPMENT_STATUS_ID => [$this, 'equipment_status_id'],
            self::SERVICE_ID => [$this, 'service_id'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function equipment_status_id(Builder $builder, $value)
    {
        $builder->where('equipment_status_id', $value);
    }

    public function service_id(Builder $builder, $value)
    {
        $builder->where('service_id', $value);
    }

}
