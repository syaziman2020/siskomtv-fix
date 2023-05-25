<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DataPegawai extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $table = "employee_data";

    protected $fillable = [
        'position',
        'name',
        'nip',
        'status',
        'image',
        'users_id'
    ];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
