<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Produtos extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image',
        'created_at',
        'updated_at',
    ];


    public static function boot(): void
    {
        parent::boot();

        static::saving(function ($model) {
            return $model->validate();
        });
    }

    public function validate(): bool
    {
        $rules = [
            'title' => 'required|unique:produtos,title,'.$this->id,
            'description' => 'required',
            'image' => 'required',
        ];

        $messages = [
            'title.required' => 'O título é obrigatório.',
            'title.unique' => 'Já existe um produto com este título.',
            'description.required' => 'A descrição é obrigatória.',
            'image.required' => 'A imagem é obrigatória.',
        ];

        $validator = Validator::make($this->attributes, $rules, $messages);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return true;
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_products', 'product_id', 'category_id');
    }
}
