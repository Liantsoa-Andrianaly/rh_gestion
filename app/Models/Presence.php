<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'employe_id', 
        'date', 
        'est_present', 
        'motif'
    ];

    public function employe() {
        return $this->belongsTo(Employe::class);
    }
}
