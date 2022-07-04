<?php

namespace App\Support\Core\Crud;

trait WithDatatable
{
    public function index()
    {
        return $this->datatable::create($this->path)->render("{$this->path}.index", [
            'route' => $this->path,
        ]);
    }
}
