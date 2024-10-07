<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    // Define the table name (optional if the table name matches the plural of the model name)
    protected $table = 'transactions';

    // Define the fillable fields
    protected $fillable = [
        'user_id',
        'amount',
        'fee',
        'transaction_type',
    ];

    /**
     * Relationship with User model (Each transaction belongs to a user)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
