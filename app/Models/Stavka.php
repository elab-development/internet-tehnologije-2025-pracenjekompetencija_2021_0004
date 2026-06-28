<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stavka extends Model
{
    use HasFactory;

    protected $table='stavke';
    protected $primaryKey='stavka_id';
    protected $fillable=[
        'naziv',
        'opis',
        'tip',
        'status',
        'korisnik_id',
        'kategorija_id'
    ];
    public function korisnik()
    {
        return $this->belongsTo(Korisnik::class,'korisnik_id','korisnik_id');
    }
    public function kategorija()
    {
        return $this->belongsTo(Kategorija::class,'kategorija_id','kategorija_id');
    }
    public function prilozi()
    {
        return $this->hasMany(Prilog::class,'stavka_id','stavka_id');
    }
}
