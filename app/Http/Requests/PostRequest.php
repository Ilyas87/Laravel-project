<?php

namespace App\Http\Requests;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'description' => [
                'required', 'string', 'max:255'
            ],
            'image' => [
                'nullable', 'file', 'image',
            ],
        ];
    }

    function validatedWithImage() {
        $data = $this->validated();

        if ($this->hasFile('image')) {

            /** @var Post $post */
            if ($post = $this->route('post')) {
                $post->deleteImage();
            }

            $data['image'] = $this->file('image')->store('public/storage/images');
        }

        return $data;
    }
}
