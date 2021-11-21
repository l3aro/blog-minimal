<?php

namespace App\Models\Filters;

use Closure;

class DateToFilter extends Filter
{
    public function __construct()
    {
        $this->filterOn('created_at');
    }

    public function handle($query, Closure $next)
    {
        $fieldName = "filter.{$this->field}_to";

        if ($this->shouldFilter($fieldName)) {
            $query->where($this->field, '<=', request()->input($fieldName));
        }

        return $next($query);
    }
}
