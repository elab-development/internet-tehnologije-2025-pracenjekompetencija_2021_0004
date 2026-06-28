<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategorija extends Model
{
    use HasFactory;
    protected $table='kategorije';
    protected $primaryKey='kategorija_id';
    protected $fillable=[
        'naziv'
    ];
    public function stavke()
    {
        return $this->hasMany(Stavka::class,'kategorija_id','kategorija_id');
    }
}
