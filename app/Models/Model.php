<?php

namespace App\Models;

use Illuminate\Support\Collection;

abstract class Model
{
    protected Collection $data;

    public function setData(array $data): void
    {
        $this->data = collect($data);
    }

    public function getData(): Collection
    {
        return $this->data;
    }
}