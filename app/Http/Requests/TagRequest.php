<?php

namespace App\Http\Requests;

use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name.required' => 'Vui lòng không để trống tên tag',
            'seo_name.required' => 'Vui lòng không để trống SEO name',
        ];
    }

    public function store()
    {
        $data = $this->all();
        Tag::create($data);

        return $this;
    }

    public function save($id)
    {
        $tag = Tag::findOrFail($id);

        $data = $this->all();

        $tag->update($data);

        return $this;
    }
}
