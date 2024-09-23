<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'serveurhote',
        'type',
        'categorie',
        'etat',
        'langage_dev',
        'date_ajout',
        'date_modif',
        'date_lancement',
        'user_id',
    ];
    
    public function versions() {
        return $this->hasMany(Version::class);
    }

    public function proprietaire() {
        return $this->hasMany(Proprietaire::class);
    }

    public function structure_de_developpement() {
        return $this->belongsTo(StructureDeDeveloppement::class);
    }

    public function documentation() {
        return $this->hasOne(Documentation::class);
    }

    //public function employe()
    //{
    //    return $this->hasMany(Employe::class);
    //}

}
