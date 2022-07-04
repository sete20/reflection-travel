<?php

namespace App\Http\Controllers\Dashboard\Accommodation;

use App\Domain\Accommodation\Datatables\AccommodationPriceDatatable;
use App\Domain\Accommodation\Models\AccommodationPrice;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class AccommodationPriceController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.accommodation.accommodation-prices';

    protected string $datatable = AccommodationPriceDatatable::class;

    protected string $model = AccommodationPrice::class;

    protected function rules()
    {
        return [
            'single'=>'required|string',
            'double'=>'required|string',
            'trible'=>'required|string',
        ];
    }

    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();

        $action = $model->update($validated);

        toast(__('Request executed successfully'), 'success');

        return redirect()->route("{$this->path}.index", ['accommodation_id'=>request('accommodation_id')]);
    }

    protected function formData(?Model $model = null): array
    {
        return [

        ];
    }
}
