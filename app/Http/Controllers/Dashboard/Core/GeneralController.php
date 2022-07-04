<?php

namespace App\Http\Controllers\Dashboard\Core;

use App\Http\Controllers\Controller;

class GeneralController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ModelSelectAjax()
    {

        $model = request('modelClass');
        $columnName = request('columnName');
        $whereColumnName = request('whereColumnName');
        $whereColumnId = request('whereColumnId');

        $query = $model::query();
        if (request()->has('q')) {
            $search = request('q');
            $data = $model::where($columnName, 'LIKE', "%$search%")
                ->select(\DB::raw("CONCAT($columnName) AS text"), 'id')
                ->paginate();
        } else {

            if ($whereColumnName && $whereColumnId) {
                $data = $query->where($whereColumnName, $whereColumnId);
            }

            $data = $query->select(\DB::raw("CONCAT($columnName) AS text"), 'id')->paginate();

        }

        return response()->json($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function MultiSelectedChecked()
    {

        $columnName = request('columnName');

        $model_id = request('model_id');
        $currentClass = request('currentClass');
        $modelClass = request('modelClass');
        $whereColumnName = request('whereColumnName');

        $whereColumnId = request('whereColumnId');
        $relationName = request('relationName');

        $model = $currentClass::find($model_id);

        $query = $modelClass::query();
        if ($whereColumnName && $whereColumnId) {
            $data = $query->where($whereColumnName, $whereColumnId);
        }

        if (request()->has('q')) {
            $search = request('q');
            $data = $query->where($columnName, 'LIKE', "%$search%");
        }
        $data = $query->select(\DB::raw("CONCAT($columnName) AS text"), 'id')->paginate();

        $relation = ($model) ? $model->{$relationName}?->pluck($columnName, 'id') : null;

        return response()->json(['selected' => $relation, 'data' => $data]);

    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function SelectedModel($id)
    {
        $columnName = request('columnName');
        $model = request('modelClass');

        $selected = $model::find($id);

        return response()->json($selected);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function SelectedRelationModel($id)
    {

        $columnName = request('columnName');
        $modelName = request('selectedRelationClass');

        $model = $modelName::find($id);

        $relationName = request('relationName');
        $relation = match (true) {
            ($relationName == 'includes') => $relation = $model->$relationName->map(function ($item) {
                return $item->include;
            })->pluck($columnName, 'id'),
            ($relationName == 'excludes') => $relation = $model->$relationName->map(function ($item) {
                return $item->exclude;
            })->pluck($columnName, 'id'),
            default => $model->$relationName->pluck($columnName, 'id')
        };

        return response()->json($relation);
    }
}
