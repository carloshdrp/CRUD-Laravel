<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class CategoryProduct extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'category_id',
        'product_id',
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
            'category_id' => 'required|unique:category_products',
            'product_id' => 'required|unique:category_products',
        ];

        $messages = [
            'category_id.required' => 'Algo deu errado com as categorias.',
            'category_id.unique' => 'Algo deu errado com as categorias.',
            'product_id.required' => 'Algo deu errado com as categorias.',
            'product_id.unique' => 'Algo deu errado com as categorias.',
        ];

        $validator = Validator::make($this->attributes, $rules, $messages);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return true;
    }
}
