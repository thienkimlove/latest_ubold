<?php

namespace App\Http\Requests;

use App\Models\Question;
use App\Models\Tag;
use Illuminate\Foundation\Http\FormRequest;
use Intervention\Image\Facades\Image;

class QuestionRequest extends FormRequest
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
            'question' => 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'title.required' => 'Vui lòng thêm tiêu đề cho câu hỏi',
            'question.required' => 'Vui lòng thêm câu hỏi',
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

        $question = Question::create($data);

        $question->tags()->sync($tagIds);

        return $this;
    }

    public function save($id)
    {
        $question = Question::findOrFail($id);

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

        $question->update($data);
        $question->tags()->sync($tagIds);

        return $this;
    }
}
