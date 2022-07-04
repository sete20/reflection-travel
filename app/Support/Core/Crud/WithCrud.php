<?php

namespace App\Support\Core\Crud;

trait WithCrud
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;
}
