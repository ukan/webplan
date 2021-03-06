<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuthLog extends Model
{
    protected $table = 'auth_logs';

    /**
     * {@inheritDoc}
     */
    
    protected $fillable = [
        'user_id','ip_address', 'login', 'logout',
    ];
}
