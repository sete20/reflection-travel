<?php

namespace App\Domain\User\Datatables;

use App\Domain\User\Models\ContactMessage;
use App\Support\Datatables\BaseDatatable;
use Illuminate\Database\Eloquent\Builder;
use Yajra\DataTables\Html\Column;

class ContactMessageDatatable extends BaseDatatable
{
    protected ?string $actionable = 'delete';

    public function query(): Builder
    {
        return ContactMessage::query();
    }

    protected function getColumns(): array
    {
        return [
            $this->column('id',__('ID')),
            $this->column('full_name',__('Name')),
            $this->column('email',__('Email')),
            $this->column('subject',__('Subject')),
            $this->column('message',__('Message')),
            $this->column('created_at',__('Created At')),
        ];
    }

    protected function getCustomColumns(): array
    {
        return [
            'created_at' => fn($model) => $model->created_at->format('d F,Y h:ia')
        ];
    }
    
}
