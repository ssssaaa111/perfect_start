<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');

    }

    public function store(RegistrationRequest $request)
    {
        $request->persist();
        session()->flash('message', 'thanks so much for signing up');
        return redirect()->home();
    }
}
