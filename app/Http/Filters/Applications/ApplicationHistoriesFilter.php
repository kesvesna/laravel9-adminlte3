<?php

namespace App\Http\Filters\Applications;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class ApplicationHistoriesFilter extends AbstractFilter
{
    public const APPLICATION_ID = 'application_status_id';
    public const SERVICE_ID = 'service_id';

    protected function getCallbacks(): array
    {
        return [
            self::APPLICATION_ID => [$this, 'application_status_id'],
            self::SERVICE_ID => [$this, 'service_id'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function application_status_id(Builder $builder, $value)
    {
        $builder->where('application_status_id', $value);
    }

    public function service_id(Builder $builder, $value)
    {
        $builder->where('service_id', $value);
    }

}
