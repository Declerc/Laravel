<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $table = 't_e_livre_liv';
    protected $primaryKey ='liv_id';
    public $timestamps =false;
}
