<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rezervacija extends Model
{
    use HasFactory;

    protected $fillable = ['ime', 'prezime', 'brojPasosa', 'destinacijaID', 'tipID'];

    protected $table = 'rezervacije';
}
