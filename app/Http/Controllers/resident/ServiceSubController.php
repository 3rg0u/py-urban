<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceSubController extends Controller
{
    //


    public function index()
    {
        $services = Service::leftJoin('service_registrations', function ($join) {
            $join->on('services.id', '=', 'service_registrations.service_id')
                ->where('service_registrations.apart_id', Auth::user()->apart_id);
        })
            ->whereNull('service_registrations.service_id')
            ->where('services.type', 'sub')
            ->select('services.*')
            ->get();

        return view('resident.service.registration.index', ['services' => $services]);
    }


    public function store($id)
    {
        dd($id);

    }
}
