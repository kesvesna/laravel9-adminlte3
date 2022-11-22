<?php

namespace App\Http\Filters\Repairs;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class RepairHistoriesFilter extends AbstractFilter
{
    public const REPAIR_ID = 'repair_status_id';
    public const SERVICE_ID = 'service_id';

    protected function getCallbacks(): array
    {
        return [
            self::REPAIR_ID => [$this, 'repair_status_id'],
            self::SERVICE_ID => [$this, 'service_id'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function repair_status_id(Builder $builder, $value)
    {
        $builder->where('repair_status_id', $value);
    }

    public function service_id(Builder $builder, $value)
    {
        $builder->where('service_id', $value);
    }

}
