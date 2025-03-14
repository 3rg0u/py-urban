<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resident;

class ResidentAccountController extends Controller
{
    //
    public function index()
    {
        return view('admin.resident.account.index');
    }
}
