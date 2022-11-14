<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ApplicationFilter extends AbstractFilter
{
    public const TRK_ID = 'trk_id';
    public const APPLICATION_ID = 'application_status_id';
    public const COMMENT = 'comment';
    public const SERVICE_ID = 'service_id';
    public const ID = 'id';
    public const CREATED_AT = 'created_at';

    protected function getCallbacks(): array
    {
        return [
            self::TRK_ID => [$this, 'trk_id'],
            self::APPLICATION_ID => [$this, 'application_status_id'],
            self::COMMENT => [$this, 'comment'],
            self::ID => [$this, 'id'],
            self::SERVICE_ID => [$this, 'service_id'],
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

    public function application_status_id(Builder $builder, $value)
    {
        $builder->where('application_status_id', $value);
    }

    public function service_id(Builder $builder, $value)
    {
        $builder->where('service_id', $value);
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
