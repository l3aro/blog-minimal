<?php

namespace App\Models\Filters;

use Closure;

class StatusFilter extends Filter
{
    public function __construct()
    {
        $this->filterOn('status');
    }

    public function handle($query, Closure $next)
    {
        $filterName = 'filter.' . $this->field;
        if ($this->shouldFilter($filterName)) {
            $query->where($this->field, request()->input('filter.' . $this->field));
        }

        return $next($query);
    }
}
