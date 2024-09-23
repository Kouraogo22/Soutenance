<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Structure_de_developpement extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'responsable',
        'email_respons',
        'contact_respons',
        'budget',
    ];

    public function application()
    {
        return $this->hasMany(Application::class);
    }
}
