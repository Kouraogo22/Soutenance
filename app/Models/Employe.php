<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'cuid',
        'email',
        'departement/direction',
        'mot_de_passe',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);   
    }

    public function notification()
    {
        return $this->hasMany(Notification::class);
    }   

}
