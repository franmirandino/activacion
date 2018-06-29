<?php

namespace App\Http\Controllers;

use Auth;

use App\ActivationToken;
use Illuminate\Http\Request;

class ActivationTokenController extends Controller
{
    public function activate(ActivationToken $token)
    {
    	

    	$token->user->activate();


    	return redirect('home')->withInfo('Tu cuenta ha sido activada.');
    }
}
