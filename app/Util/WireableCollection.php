<?php

namespace App\Util;

use Illuminate\Support\Collection;
use Livewire\Wireable;

class WireableCollection extends Collection implements Wireable
{
    public function __construct($items = [])
    {
        return parent::__construct($items);
    }

    public static function fromLivewire($value): static
    {
        $value = json_decode(json_encode($value));

        return new static($value);
    }

    public function toLivewire(): array
    {
        return $this->items;
    }
}