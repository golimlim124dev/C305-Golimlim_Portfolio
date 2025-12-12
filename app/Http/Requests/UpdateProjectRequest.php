<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        // similar to store, but image can be nullable
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'nullable|string|max:100',
            'link' => 'nullable|url|max:255',
            'image' => 'nullable|file|image|mimes:jpg,jpeg,png,webp|max:5120',
        ];
    }
}
