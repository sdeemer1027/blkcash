<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditCard extends Model
{
    use HasFactory;

  protected $fillable = [
        'braintree_token',
        'name',
        'expirationDate',
        'last4',
        'cardType',
        'cvv',
        'user_id',
    ];        
        


 public function user()
    {
        return $this->belongsTo(User::class);
    }
    

}
