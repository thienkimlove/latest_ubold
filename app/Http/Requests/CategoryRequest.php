<?php

namespace App\Http\Requests;

use App\Models\Category;
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

        Category::create($data);

        return $this;
    }

    public function save($id)
    {
        $category = Category::findOrFail($id);

        $data = $this->all();

        if (! isset($this->status)) {
            $data['status'] = 0;
        }

        $category->update($data);

        return $this;
    }
}
