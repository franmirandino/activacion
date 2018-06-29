<?php

namespace App;

use App\ActivationToken;
use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

    public function activate()
    {
        $this->update(['active' => true]);

        Auth::login($this);

        $this->token->delete();
    }



    public function token()
    {
        return $this->hasOne(ActivationToken::class);
    }

    public function generateToken()
    {
        $this->token()->create([            
            'token' => str_random(60)
        ]);

        return $this;
    }

}
