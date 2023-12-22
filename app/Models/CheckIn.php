<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function checkOut()
    {
        return $this->hasOne(CheckOut::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
    public function isCheckedOut()
    {
        return CheckOut::where('check_in_id', $this->id)->exists();
    }
}
