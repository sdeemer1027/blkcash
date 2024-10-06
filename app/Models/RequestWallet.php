<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestWallet extends Model
{
    use HasFactory;


     protected $fillable = [
        'user_id',
        'from_user_id',
        'amount',
        'approval',
        'notes',

    ];
 protected $table = 'request_wallet'; // Specify the table name here

public function Requestuser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function RequestfromUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


}
