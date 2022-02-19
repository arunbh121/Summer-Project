<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $fillable = ['room_type_id','feature_image','room_number','created_by'];
    function roomType(){
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
}
