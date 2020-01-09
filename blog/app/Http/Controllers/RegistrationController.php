<?php

namespace App\Http\Controllers;


use App\Http\Requests\RegistrationForm;



class RegistrationController extends Controller
{
    public function create()
    {
        return view('registration.create');
    }

    public function store(RegistrationForm $form)
    {
        // Validate the form
        // $this->validate(request(), [
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'password' => 'required|confirmed'
        // ]);

        // Create and save the user
        // $user = User::create(
        //     request(['name','email','password'])
        // );

        $form->persist();

        session()->flash('message', 'Thanks so much for signing up!');
       
        
        // Redirect t the home page
        return redirect()->home();    

    }
}
