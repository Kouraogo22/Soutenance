<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Version extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_version',
        'date_sortie',
        'outils_utilise',
        'contact_MAJ',
        'serveur_type',
        'os_type',
    ];
    
    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
