<?php

namespace App\Models\Filters;

use Closure;

class BooleanFilter extends Filter
{
    public function __construct($field)
    {
        $this->filterOn($field);
    }

    public function handle($query, Closure $next)
    {
        $filterName = 'filter.' . $this->field;
        if ($this->shouldFilter($filterName)) {
            $query->where($this->field, request()->input('filter.' . $this->field) ? 1 : 0);
        }

        return $next($query);
    }
}
