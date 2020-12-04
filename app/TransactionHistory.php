<?php

namespace Vanguard;

use Illuminate\Database\Eloquent\Model;

class TransactionHistory extends Model
{
    
    protected $table = 'transaction_history';

    protected $fillable = ['user_email', 'level'];
}
