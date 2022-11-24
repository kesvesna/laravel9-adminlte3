<?php

namespace App\Http\Filters\Equipments;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class EquipmentNamesFilter extends AbstractFilter
{
    public const EQUIPMENT_NAME = 'equipment_name_id';


    protected function getCallbacks(): array
    {
        return [
            self::EQUIPMENT_NAME => [$this, 'equipment_name_id'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function equipment_name_id(Builder $builder, $value)
    {
        $builder->where('name', 'like', '%' . $value . '%');
    }
}
