<?php

namespace App\Http\Requests;

use App\Lib\Helpers;
use App\Models\Event;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class ProductRequest extends FormRequest
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
            'title' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng thêm tên sản phẩm',
        ];
    }

    public function store()
    {
        $data = $this->all();

        $tagIds = [];
        if ($this->tags) {
            foreach ($this->tags as $tag) {
                $tagIds[] = Tag::firstOrCreate(['name' => $tag])->id;
            }
        }

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

        $productAttributes = Helpers::getProductAttributes();

        $additions = [];

        if ($productAttributes) {
            foreach ($productAttributes as $productAttribute) {
                $additions[$productAttribute] = $data[$productAttribute];
                unset($data[$productAttribute]);
            }
        }

        $data['additions'] = $additions ? json_encode($additions, true) : '';

        $data['user_id'] = \Sentinel::getUser()->id;

        $product = Product::create($data);

        $product->tags()->sync($tagIds);


        return $this;
    }

    public function save($id)
    {
        $product = Product::findOrFail($id);

        $data = $this->all();

        $tagIds = [];
        if ($this->tags) {
            foreach ($this->tags as $tag) {
                $tagIds[] = Tag::firstOrCreate(['name' => $tag])->id;
            }
        }


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

        $productAttributes = Helpers::getProductAttributes();

        $additions = [];

        if ($productAttributes) {
            foreach ($productAttributes as $productAttribute) {
                $additions[$productAttribute] = $data[$productAttribute];
                unset($data[$productAttribute]);
            }
        }

        $data['additions'] = $additions ? json_encode($additions, true) : '';

        $before = json_encode($product->toArray(), true);

        $product->update($data);
        $product->tags()->sync($tagIds);


        Event::create([
            'content' => 'products',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => json_encode($data, true),
            'content_id' => $product->id
        ]);

        return $this;
    }
}
