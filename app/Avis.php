<?php


namespace App;
use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $table = 't_e_avis_avi';
    protected $primaryKey = 'avi_id';
    public $timestamps = false;
}
