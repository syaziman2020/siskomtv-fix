<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RuangDosen extends Model
{

    use HasFactory;
    public $table = "lecturer_room";

    protected $fillable = [
        'status',
    ];

    protected $hidden = [];
}
