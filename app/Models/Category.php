<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Category extends Model
{
    protected $fillable = [
        'name',
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
            'name' => 'required|unique:categories',
        ];

        $messages = [
            'name.required' => 'O nome é obrigatório.',
            'name.unique' => 'Já existe uma categoria com este nome.',
        ];

        $validator = Validator::make($this->attributes, $rules, $messages);

        if ($validator->fails()) {
            throw new \Exception($validator->errors()->first());
        }

        return true;
    }

    public function produtos()
    {
        return $this->belongsToMany(Produtos::class, 'category_products', 'category_id', 'product_id');
    }
}
