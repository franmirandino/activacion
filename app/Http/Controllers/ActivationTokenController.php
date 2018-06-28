<?php

namespace App\Http\Controllers;

use Auth;

use App\ActivationToken;
use Illuminate\Http\Request;

class ActivationTokenController extends Controller
{
    public function activate(ActivationToken $token)
    {
    	$token->user->update(['active' => true]);

    	Auth::login($token->user);

    	$token->delete();

    	return redirect('home')->withInfo('Tu cuenta ha sido activada.');
    }
}
