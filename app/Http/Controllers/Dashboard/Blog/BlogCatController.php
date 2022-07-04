<?php

namespace App\Http\Controllers\Dashboard\Blog;

use App\Domain\Blog\Datatables\BlogCatDatatable;
use App\Domain\Blog\Models\BlogCat;
use App\Domain\Blog\Models\BlogSection;
use App\Domain\Coretour\Models\Faq;
use App\Domain\CoreTour\Models\Highlight;
use App\Domain\Coretour\Models\Tip;
use App\Http\Controllers\Controller;
use App\Support\Core\Crud\WithDatatable;
use App\Support\Core\Crud\WithDestroy;
use App\Support\Core\Crud\WithForm;
use App\Support\Core\Crud\WithStore;
use App\Support\Core\Crud\WithUpdate;
use Illuminate\Database\Eloquent\Model;

class BlogCatController extends Controller
{
    use WithDatatable, WithForm, WithStore, WithUpdate, WithDestroy;

    protected string $path = 'dashboard.blog.blog-cats';

    protected string $datatable = BlogCatDatatable::class;

    protected string $model = BlogCat::class;

    protected function rules()
    {
        return [
            'name' => 'required',
            'title' => '',
            'slug' => '',
            'description' => '',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'meta_title' => '',
            'meta_keywords' => '',
            'meta_description' => '',
            'blog_section_id' => 'required|exists:blog_sections,id',
            'faqs.*' => 'exists:faqs,id',
            'highlights.*' => 'exists:highlights,id',
            'tips.*' => 'exists:tips,id',
        ];
    }

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validated = $this->validationAction();
        $request = request()->except(['image', 'faqs', 'highlights', 'tips']);
        $model = ($this->model)::create($request);
        if(request('image')){
            $model->addMedia(request('image'))->toMediaCollection();
        }
        $this->CreateUpdateLinkable($model);

        return $this->successfulRequest();
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function update($id)
    {
        $model = ($this->model)::findOrFail($id);
        $validated = $this->validationAction();
        $request = request()->except(['image', 'faqs', 'highlights', 'tips']);
        $modelUpdate = $model->update($request);
        if(request('image')){
            $model->clearMediaCollection();
            $model->addMedia(request('image'))->toMediaCollection();
        }
        $this->CreateUpdateLinkable($model, 'update');

        return  $this->successfulRequest();
    }

    /**
     * @param $model
     * @param $method
     * @return void
     */
    public function CreateUpdateLinkable($model, $method = 'create') {
        $this->CreateLinks($model, request('faqs'), $method, 'faqs', 'faq_id');
        $this->CreateLinks($model, request('highlights'), $method, 'highlights', 'highlight_id');
        $this->CreateLinks($model, request('tips'), $method, 'tips', 'tip_id');
    }

    public function CreateLinks($model, $request, $method, $relationName, $columnName) {

        if($request){
            if($method == 'update'){
                $model->$relationName()->delete();
            }
            foreach ($request as $value){
                $model->$relationName()->create([
                    $columnName => $value,
                ]);
            }
        }
    }

    protected function formData(?Model $model = null): array
    {

        return [
            'sections'=> toMap(BlogSection::get()),
            'tips'=> toMap(Tip::get()),
            'highlights'=> toMap(Highlight::get()),
            'faqs'=> Faq::pluck('question', 'id'),
        ];
    }
}
