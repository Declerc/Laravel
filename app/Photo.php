<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $table = 't_e_photo_pho';
    protected $primaryKey ='pho_id';
    public $timestamps =false;
}
