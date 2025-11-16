<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0', 
            'category' => 'required|string|in:Pashmina,Jilbab Segi Empat', 
            'image_url' => 'nullable|url|max:500',
            'is_new_arrival' => 'nullable|boolean',
            'tag' => 'nullable|string|max:50',
        ];
    }
}