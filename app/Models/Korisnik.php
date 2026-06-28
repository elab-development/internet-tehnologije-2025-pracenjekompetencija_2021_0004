<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Korisnik extends Model
{
    use HasFactory;
    protected $table='korisnici';
    protected $primaryKey='korisnik_id';
    protected $fillable=[
        'email',
        'lozinka',
        'rola'
    ];
    protected $hidden=[
        'lozinka',
        'remember_token'
    ];
    public function profil()
    {
        return $this->hasOne(Profil::class,'korisnik_id','korisnik_id');
    }
    public function stavke()
    {
        return $this->hasMany(Stavka::class,'korisnik_id','korisnik_id');
    }
}
