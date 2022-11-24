<?php

namespace App\Http\Filters\Users;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const USER_STATUS_ID = 'user_status_id';
    public const ID = 'id';
    public const CREATED_AT = 'created_at';
    public const NAME = 'name';
    public const EMAIL = 'email';

    protected function getCallbacks(): array
    {
        return [
            self::ID => [$this, 'id'],
            self::CREATED_AT => [$this, 'created_at'],
            self::USER_STATUS_ID => [$this, 'user_status_id'],
            self::NAME => [$this, 'name'],
            self::EMAIL => [$this, 'email'],
        ];
    }

    public function id(Builder $builder, $value)
    {
        $builder->where('id', $value);
    }

    public function user_status_id(Builder $builder, $value)
    {
        $builder->where('user_status_id', $value);
    }

    public function created_at(Builder $builder, $value)
    {
        $builder->where('created_at', 'like', "%{$value}%");
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function email(Builder $builder, $value)
    {
        $builder->where('email', 'like', "%{$value}%");
    }

}
