<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = "subscriptions";
    protected $fillable = [
        'email',
        'ip',
    ];
}
