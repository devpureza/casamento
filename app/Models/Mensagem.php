<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    protected $table = 'mensagens';
    
    protected $fillable = [
        'product_id',
        'nome',
        'email',
        'mensagem',
        'quantidade_cotas',
        'payment_intent_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}