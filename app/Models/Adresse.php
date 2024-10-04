<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adresse extends Model
{
    use HasFactory;
    protected $fillable = [
        'rue',
        'ville',
        'code_postal',
        'pays',
        'employe_id',
    ];
    public function employe(){
        return this->belongsTo(Employe::class);
    }
}
