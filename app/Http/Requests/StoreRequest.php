<?php

namespace App\Http\Requests;

use App\Models\Store;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'district_id' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên',
            'district_id.required' => 'Vui lòng chọn quận huyện',
        ];
    }

    public function save($id)
    {
        $store = Store::findOrFail($id);

        $data = $this->all();


        $store->update($data);

        return $this;
    }
}
