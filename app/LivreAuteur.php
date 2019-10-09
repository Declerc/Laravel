<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LivreAuteur extends Model
{
    protected $table = "t_j_auteurlivre_aul";
    protected $primaryKey = "aut_id";
    public $timestamps = false;
}