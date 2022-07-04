<?php

namespace App\Http\Controllers\Dashboard\User;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;
use App\Domain\User\Datatables\ContactMessageDatatable;
use App\Domain\User\Models\ContactMessage;

class ContactMessageController extends Controller
{
    use WithDatatable, WithDestroy;

    protected string $path = 'dashboard.user.contact-messages';

    protected string $datatable = ContactMessageDatatable::class;

    protected string $model = ContactMessage::class;
}
