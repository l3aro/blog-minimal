<?php

namespace App\Http\Livewire\Traits;

use Illuminate\Database\Eloquent\Builder;
use Livewire\WithPagination;

trait HasDataTable
{
    use WithPagination;

    public $perPage = 10;
    public $filter = [];
    public $sort = [];
    public $arrayFilters = [];

    public function mountHasDataTable()
    {
        $this->fill(request()->only('sort', 'filter'));
        $filter = request()->only('filter');

        if ($filter && isset($filter['filter'])) {
            foreach ($filter['filter'] as $key => $value) {
                if (array_key_exists($key, $this->arrayFilters)) {
                    $this->arrayFilters[$key] = explode(',', $value);
                }
            }
        }
    }

    public function updatingFilter()
    {
        $this->resetPage();
    }

    public function updatedFilter($value, $name)
    {
        if ($value === '') {
            unset($this->filter[$name]);
        }
    }

    public function updatingArrayFilters()
    {
        $this->resetPage();
    }

    public function updatedArrayFilters($value, $name)
    {
        $this->syncWithFilter($name, $value);
    }

    public function syncWithFilter($name, $value)
    {
        $this->filter[$name] = $value;
    }

    public function updatingSort()
    {
        $this->resetPage();
    }

    public function applySort($field)
    {
        $this->resetPage();
        if (!isset($this->sort[$field])) {
            $this->sort[$field] = 'desc';
            return;
        }
        if ($this->sort[$field] === 'desc') {
            $this->sort[$field] = 'asc';
            return;
        }
        unset($this->sort[$field]);
    }

    public function queryBuilder($subject): Builder
    {
        $request = request();
        $request->query->set('sort', $this->sort);
        $request->query->set('filter', $this->filter);
        return $subject;
    }

    public function resetFilter()
    {
        $this->filter = [];
        $this->resetPage();
    }
}
