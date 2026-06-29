<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Korisnik extends Model implements Authenticatable, JWTSubject
{
    use HasFactory, AuthenticatableTrait;
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
    public function getAuthPassword(){
        return $this->lozinka;
    }
    public function getJWTIdentifier(){
        return $this->getKey();
    }
    public function getJWTCustomClaims(){
        return [
            'rola'=>$this->rola,
        ];
    }
    public function profil()
    {
        return $this->hasOne(Profil::class,'korisnik_id','korisnik_id');
    }
    public function stavke()
    {
        return $this->hasMany(Stavka::class,'korisnik_id','korisnik_id');
    }
}
