<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function eAdmin()
    {
      return $this->id == 1;
    }

    public function carros()
    {
      return $this->belongsToMany(Carro::class);
    }

    public function chamados()
    {
      return $this->belongsToMany(Chamado::class);
    }

    public function papeis()
    {
      return $this->belongsToMany(Papel::class);
    }

    public function adicionaPapel($papel)
    {
      if (is_string($papel)) {
        $papel = Papel::where('nome', '=', $papel)->get();
      }

      if ($this->existePapel($papel)) {
        return;
      }

      return $this->papeis()->attach($papel);
    }

    public function removePapel($papel)
    {
      if (is_string($papel)) {
        $papel = Papel::where('nome', '=', $papel)->get();
      }

      return $this->papeis()->detach($papel);
    }

    private function existePapel($papel)
    {
      if (is_string($papel)) {
        $papel = Papel::where('nome', '=', $papel)->firstOrFail();
      }

      return (boolean) $this->papeis()->find($papel->id);
    }
}
