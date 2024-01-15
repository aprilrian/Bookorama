<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;

class books extends Model
{
    use HasFactory;

    protected $table = 'books';
    protected $primaryKey = 'isbn';
    protected $keyType = 'string';

    public $timestamps = false;

    public static function rules() {
        return [
            'isbn' => [
                'required',
                'regex:/^\d{1}-\d{3}-\d{5}-\d{1}$/',
                Rule::unique('books')->ignore('books', 'isbn'),
            ],
            'author' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'categoryid' => 'required|in:1,2,3,4',
        ];
    }

    public static function updateRules(){
        return [
            'author' => 'required',
            'title' => 'required',
            'price' => 'required|numeric',
            'categoryid' => 'required|in:1,2,3,4',
        ];
    }

    public static function messages() {
        return [
            'isbn.required' => 'The ISBN field is required.',
            'isbn.regex' => 'The ISBN format is not valid. Example: 1-234-56789-1',
            'isbn.unique' => 'The ISBN has already been taken.',
            'price.numeri' => 'The Price field must be numeric.',
        ];
    }
}

