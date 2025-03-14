<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    //
    public function indexRegistration()
    {
        $sub_services = Service::where('type', 'sub')->get();
    }
}
