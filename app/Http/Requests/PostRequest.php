<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class PostRequest extends FormRequest
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
            'category_id' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng không để trống tên bài viết',
            'category_id.required' => 'Vui lòng chọn chuyên mục cho bài viết',
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

        $data['user_id'] = \Sentinel::getUser()->id;
        $post = Post::create($data);
        $post->tags()->sync($tagIds);

        return $this;
    }

    public function save($id)
    {
        $post = Post::findOrFail($id);

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

        $before = json_encode($post->toArray(), true);
        $post->update($data);
        $post->tags()->sync($tagIds);

        Event::create([
            'content' => 'posts',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => json_encode($data, true),
            'content_id' => $post->id
        ]);

        return $this;
    }
}
