<?php

namespace App\Http\Requests;

use App\Models\Contact;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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

        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng không để trống tên',

        ];
    }

    public function store()
    {
        $data = $this->all();
        if (! isset($this->status)) {
            $data['status'] = 0;
        }
        Contact::create($data);

        return $this;
    }

    public function save($id)
    {
        $contact = Contact::findOrFail($id);

        $data = $this->all();
        if (! isset($this->status)) {
            $data['status'] = 0;
        }
        $contact->update($data);

        return $this;
    }
}
