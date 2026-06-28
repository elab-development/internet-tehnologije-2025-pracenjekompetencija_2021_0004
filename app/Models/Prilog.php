<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prilog extends Model
{
    use HasFactory;
    protected $table='prilozi';
    protected $primaryKey='prilog_id';
    protected $fillable=[
        'putanja_fajla',
        'stavka_id'
    ];
    public function stavka()
    {
        return $this->belongsTo(Stavka::class,'stavka_id','stavka_id');
    }
}
