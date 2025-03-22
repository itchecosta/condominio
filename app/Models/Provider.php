<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
        'category_id', 
        'name', 
        'phone', 
        'email', 
        'description',
        'street', 
        'number', 
        'complement', 
        'neighborhood', 
        'city', 
        'state', 
        'zipcode',
        'website', 
        'logo', 
        'working_hours', 
        'status', 
        'latitude', 
        'longitude'
    ];

    // Relacionamento com a categoria
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relacionamento com as avaliações
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Método para calcular a média do orçamento
    public function averageQuote()
    {
        return $this->reviews()->avg('quote_value');
    }
}
