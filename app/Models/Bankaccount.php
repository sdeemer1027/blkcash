<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bankaccount extends Model
{
    use HasFactory;



    protected $fillable = [
        'user_id',
        'name',
        'routing',
        'account',
        'cash',
        'deposit',
        'withdraw',
        'to',
        'from',
        'amount',
        'to_user_id',
        'from_user_id',
    ];









}
