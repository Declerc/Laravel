<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    protected $table = "t_e_auteur_aut";
    protected $primaryKey = "aut_id";
    public $timestamps = false;
}
