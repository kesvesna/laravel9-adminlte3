<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ApplicationFilter extends AbstractFilter
{
    public const TRK_ID = 'trk_id';
    public const COMMENT = 'comment';

    protected function getCallbacks(): array
    {
        return [
            self::TRK_ID => [$this, 'trk_id'],
            self::COMMENT => [$this, 'comment'],
        ];
    }

    public function trk_id(Builder $builder, $value)
    {
        $builder->where('trk_id', $value);
    }

    public function comment(Builder $builder, $value)
    {
        $builder->where('comment', 'like', "%{$value}%");
    }
}
