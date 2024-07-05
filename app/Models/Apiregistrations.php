<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apiregistrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'mobile_network',
        'message',
        'ref_code'
    ];
}
