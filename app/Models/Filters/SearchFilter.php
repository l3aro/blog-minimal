<?php

namespace App\Models\Filters;

use Closure;

class SearchFilter extends Filter
{
    public function __construct()
    {
        $this->filterOn('search');
    }

    public function handle($query, Closure $next)
    {
        $filterName = 'filter.' . $this->field;

        if ($this->shouldFilter($filterName)) {
            $query->search(request()->input($filterName));
        }

        return $next($query);
    }
}
