<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FormValidation extends Controller
{
    function checkErrors(Request $req){
        //write code to check all required fields and check email validation and return errors
        $req->validate([
            //check name is required and full name first and second name
            'name'=>'required | max:25 | min:5',
            //check username is required 
            'user_name'=>'required' ,
            //check phone number is required and phone number validation
            'phone'=> 'required | regex:/^[0-9]{11}$/',
            
            //check email is required and email validation
            'email'=>'required | email',
            //check password length greater than 8 characters and continue 1 integer and 1 special character
            'password'=>'required | min:8 | regex:/[a-z]/ | regex:/[A-Z]/ | regex:/[0-9]/ | regex:/[@$!%*#?&+-]/',
            //check confirm password is same as password
            'confirm_password'=>'required | same:password',
            //check address is required
            'address'=>'required',
            //check birthdate is required 
            'birthdate'=>'required'
            
            ]);
        //if no errors return success message
        return back()->with('success','Form submitted successfully!');
        
    }
}
