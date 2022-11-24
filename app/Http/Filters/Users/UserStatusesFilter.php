<?php

namespace App\Http\Filters\Users;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserStatusesFilter extends AbstractFilter
{
    public const USER_NAME = 'user_status_id';


    protected function getCallbacks(): array
    {
        return [
            self::USER_NAME => [$this, 'user_status_id'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function user_status_id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }
}
