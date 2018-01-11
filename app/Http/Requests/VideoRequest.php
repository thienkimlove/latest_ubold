<?php

namespace App\Http\Requests;

use App\Models\Event;
use App\Models\Tag;
use App\Models\Video;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class VideoRequest extends FormRequest
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
            'title.required' => 'Vui lòng thêm tiêu đề cho video',
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

        $video = Video::create($data);

        $video->tags()->sync($tagIds);


        return $this;
    }

    public function save($id)
    {
        $video = Video::findOrFail($id);

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

        $before = json_encode($video->toArray(), true);
        $video->update($data);
        $video->tags()->sync($tagIds);

        Event::create([
            'content' => 'videos',
            'action' => 'edit',
            'user_id' => \Sentinel::getUser()->id,
            'before' => $before,
            'after' => json_encode($data, true),
            'content_id' => $video->id
        ]);

        return $this;
    }
}
