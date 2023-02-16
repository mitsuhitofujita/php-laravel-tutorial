<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostDestroyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'id' => 'required',
        ];
    }

    public function validationData()
    {
        return collect([
            'id' => $this->route('id')
        ])->merge($this->all())->toArray();
    }

    public function getId(): string
    {
        return $this->route('id');
    }

    public function getUserId(): int
    {
        return $this->user()->id;
    }
}
