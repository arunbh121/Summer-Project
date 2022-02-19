<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warden extends Model
{
    use HasFactory;
    protected $table = 'wardens';
    protected $fillable = ['warden_name','email','phone_number','short_description'];

}
