<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $primaryKey = 'cart_id';

    protected $guarded = [];

    public function ebook()
    {
        return $this->hasOne(EBook::class, 'ebook_id', 'ebook_id');
    }
    public function account()
    {
        return $this->hasOne(Account::class, 'account_id', 'account_id');
    }
}
