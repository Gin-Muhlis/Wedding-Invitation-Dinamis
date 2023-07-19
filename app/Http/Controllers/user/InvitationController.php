<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvitationController extends Controller
{
    public function demo(Request $request)
    {
        return view('invitation.A001');
    }
}
