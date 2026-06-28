<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $table='profili';
    protected $primaryKey='profil_id';
    protected $fillable=[
        'korisnik_id',
        'ime',
        'prezime',
        'bio',
        'titula',
        'putanja_slike'
    ];
    public function korisnik()
    {
        return $this->belongsTo(Korisnik::class,'korisnik_id','korisnik_id');
    }
}
