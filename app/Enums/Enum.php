<?php

namespace App\Enums;

class Enum
{
    protected $items;
    protected $labels;

    public function __construct()
    {
        $this->items = [];
        $this->labels = [];
    }

    public function values()
    {
        return $this->items;
    }

    public function keys()
    {
        return array_keys($this->items);
    }

    public function labels()
    {
        return $this->labels;
    }

    public function label($key)
    {
        return $this->labels[$key];
    }
}