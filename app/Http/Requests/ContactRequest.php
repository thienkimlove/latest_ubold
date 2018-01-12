<?php

namespace App\Http\Requests;

use App\Models\Contact;
use App\Models\Event;
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

        ];

        return $rules;
    }

    public function messages()
    {
        return [


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

        $before = json_encode($contact->toArray(), true);

        $contact->update($data);

        Event::create([
            'content' => 'contacts',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => json_encode($data, true),
            'content_id' => $contact->id
        ]);

        return $this;
    }
}
