<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterApiRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class RegisterApiController extends Controller
{
    public function store(RegisterApiRequest $request)
    {
        $user = new User();
        $hashedPassword = Hash::make($request->input('password'));
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $hashedPassword;
        
        $user->save();
       
        return redirect()->route('welcome')
                    ->with('status', 'Successful!');    
        
        
    }
}
