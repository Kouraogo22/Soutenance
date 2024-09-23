<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'date_envoie',
    ];
    
    public function employe()
    {
        return $this->hasOne(Employe::class);
    }   
}
