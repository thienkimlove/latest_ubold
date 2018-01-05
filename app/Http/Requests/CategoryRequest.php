<?php

namespace App\Http\Requests;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'name' => 'required',
            'seo_name' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên chuyên mục',
            'seo_name.required' => 'Vui lòng không để trống SEO name',
        ];
    }

    public function store()
    {
        $data = $this->all();

        if (! isset($this->status)) {
            $data['status'] = 0;
        }

        $category = Category::create($data);

        Event::create([
            'content' => 'categories',
            'action' => 'create',
            'user_id' => \Sentinel::getUser()->id,
            'before' => null,
            'after' => json_encode($data, true),
            'content_id' => $category->id
        ]);

        return $this;
    }

    public function save($id)
    {
        $category = Category::findOrFail($id);

        $data = $this->all();

        if (! isset($this->status)) {
            $data['status'] = 0;
        }

        $before = json_encode($category->toArray(), true);

        $category->update($data);

        Event::create([
            'content' => 'categories',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => json_encode($data, true),
            'content_id' => $category->id
        ]);

        return $this;
    }
}
