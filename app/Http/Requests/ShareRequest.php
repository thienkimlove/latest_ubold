<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Models\Share;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class ShareRequest extends FormRequest
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


        if ($this->hasFile('avatar') && $this->file('avatar')->isValid()) {

            $filename = $this->file('avatar')->getClientOriginalName();

            if (file_exists(public_path('files/'. $filename))) {
                $filename = substr(uniqid(), 0, 4).'_'.$filename;
            }

            Image::make($this->file('avatar')->getRealPath())->save(public_path('files/'. $filename));

            $data['image'] = $filename;
        }

        Share::create($data);

        return $this;
    }

    public function save($id)
    {
        $share = Share::findOrFail($id);

        $data = $this->all();
        if (! isset($this->status)) {
            $data['status'] = 0;
        }

        if ($this->hasFile('avatar') && $this->file('avatar')->isValid()) {

            $filename = $this->file('avatar')->getClientOriginalName();

            if (file_exists(public_path('files/'. $filename))) {
                $filename = substr(uniqid(), 0, 4).'_'.$filename;
            }

            Image::make($this->file('avatar')->getRealPath())->save(public_path('files/'. $filename));

            $data['image'] = $filename;
        }

        $before = json_encode($share->toArray(), true);

        $share->update($data);

        Event::create([
            'content' => 'shares',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => json_encode($data, true),
            'content_id' => $share->id
        ]);

        return $this;
    }
}
