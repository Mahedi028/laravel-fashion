<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_tbl extends Model
{
    use HasFactory;
    public $timestamp=false;
    protected $fillable = [
        'username',
        'email',
        'password',
        'confirm_password',
    ];

}
