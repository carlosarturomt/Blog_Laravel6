<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function poss()
    {
        return $this->hasMany(Pos::class);
    }

    public function getGetNameAttribute()
    {
        return strtoupper($this->name);
    }

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower($value); //cuando se trate del campo 'Users', el $value se va convertir en minuscula.
        // cuando se vaya a guardar el nombre(Name), este sufre una transformación y se convierte en minuscula
    }
}
