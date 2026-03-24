<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PageVisit extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'user_id',
        'path',
        'url',
        'ip_address',
        'user_agent',
        'referrer',
        'referrer_host',
        'visited_at',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
