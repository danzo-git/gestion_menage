<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tache extends Model
{
   protected $fillable=["nom_tache","description_tache"];
}
