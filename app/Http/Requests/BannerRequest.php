<?php

namespace App\Http\Requests;

use App\Models\Banner;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class BannerRequest extends FormRequest
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
            'link' => 'required',
            'position_id' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'link.required' => 'Vui lòng không để trống đường dẫn quảng cáo',
            'position_id.required' => 'Vui lòng chọn vị trí cho quảng cáo',
        ];
    }

    public function store()
    {
        $data = $this->all();

        if (! isset($this->status)) {
            $data['status'] = 0;
        }

        $data['image'] = '';

        if ($this->hasFile('avatar') && $this->file('avatar')->isValid()) {

            $filename = $this->file('avatar')->getClientOriginalName();

            if (file_exists(public_path('files/'. $filename))) {
                $filename = substr(uniqid(), 0, 4).'_'.$filename;
            }

            Image::make($this->file('avatar')->getRealPath())->save(public_path('files/'. $filename));

            $data['image'] = $filename;
        }

        Banner::create($data);

        return $this;
    }

    public function save($id)
    {
        $banner = Banner::findOrFail($id);

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

        $banner->update($data);

        return $this;
    }
}
