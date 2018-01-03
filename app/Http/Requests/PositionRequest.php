<?php

namespace App\Http\Requests;

use App\Models\Position;
use Illuminate\Foundation\Http\FormRequest;

class PositionRequest extends FormRequest
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
            'name' => 'required|max:255',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên vị trí',
        ];
    }

    public function store()
    {
        $data = $this->all();

        Position::create($data);

        return $this;
    }

    public function save($id)
    {
        $position = Position::findOrFail($id);

        $data = $this->all();

        $position->update($data);

        return $this;
    }
}
