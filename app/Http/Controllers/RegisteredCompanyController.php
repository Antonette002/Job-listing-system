<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Company;

class RegisteredCompanyController extends Controller
{
    public function create()
    {
        return view('auth.register-company');
    }

   

       
    }
}
