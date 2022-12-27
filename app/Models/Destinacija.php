<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinacija extends Model
{
    use HasFactory;

    protected $fillable = ['destinacija', 'drzava', 'datum'];

    protected $table = 'destinacije';
}
