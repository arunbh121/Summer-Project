<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected  $table= 'students';
    protected $fillable =['feature_image','name','age','permanent_address','admitted_date','email','phone_number',
        'guardian_name','guardian_phone_number','room_id'];

    public function RoomId(){
        return$this->belongsTo(Room::class,'room_id');
    }

}
