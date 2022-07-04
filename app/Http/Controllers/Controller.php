<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected string $path;

    protected string $model;

    protected string $datatable;

    /**
     * @description List of rules to validate the incoming requests
     *
     * @return array
     */
    protected function rules()
    {
        return [];
    }

    public function successfulRequest(
        ?string $route = null,
        bool $asJson = false
    ): RedirectResponse|JsonResponse {
        if ($asJson) {
            return response()->json([
                'status'  => true,
                'message' => __('Request executed successfully'),
            ]);
        }
        toast(__('Request executed successfully'), 'success');

        return redirect()->route($route ?: "{$this->path}.index");
    }

    protected function validationAction(): array
    {
        return request()->validate($this->rules());
    }

    protected function queryBuilder(): Builder
    {
        return ($this->model)::query();
    }
}
