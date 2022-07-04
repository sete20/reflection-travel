<?php

namespace App\Http\Controllers\Dashboard\User;

use App\Domain\User\Datatables\QuestionDatatable;
use App\Domain\User\Models\Question;
use App\Domain\User\Models\User;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class QuestionController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.user.questions';

    protected string $datatable = QuestionDatatable::class;

    protected string $model = Question::class;

    protected function rules()
    {
        return [
            'title'=>'sometimes|nullable|string',
            'answer'=>'sometimes|nullable|string',
            'status'=>'required|string|in:'.config('enum.question_status'),
            'user_id'=>'required|integer|exists:users,id',
        ];
    }

    public function store()
    {
        $validated = $this->validationAction();
        $validated['user_id'] = auth()->user()->id;
        if(auth()->user()->hasRole('super')){
            $validated['status'] = 'live';
        }
        $action = $this->storeAction($validated);

        return $action ?? $this->successfulRequest();
    }

    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();
        if(auth()->user()->hasRole('super')){
            $validated['status'] = 'live';
        }
        $action = $this->updateAction($validated, $model);

        return $action ?? $this->successfulRequest();
    }

    protected function formData(?Model $model = null): array
    {
        return [
            'userClass' => User::class,
        ];
    }
}
