<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "t_e_adherent_adh";
    public $timestamps = false;
    protected $primaryKey = "adh_id";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'adh_pseudo', 'adh_mel', 'adh_motpasse', 'adh_civilite', 'adh_nom', 'adh_prenom', 'adh_telfixe', 'adh_telportable', 'adh_numadherent', 'adh_datefinadhesion'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'adh_motpasse', 'remember_token',
    ];

    public function getAuthPassword() {
        return $this->adh_motpasse;
    }

    public function save(array $options = array()){
        if(isset($this->remember_token))
            unset($this->remember_token);
        return parent::save($options);
    }


}
