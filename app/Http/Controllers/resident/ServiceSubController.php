<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceRegistration;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
        try {
            Service::findOrFail($id);
            ServiceRegistration::create(
                [
                    'service_id' => $id,
                    'apart_id' => Auth::user()->apart_id
                ]
            );
            return back()->with('success', 'Đăng ký dịch vụ hoàn tất!');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }

    }



    public function registered()
    {
        $services = Service::join('service_registrations', 'services.id', '=', 'service_registrations.service_id')
            ->where('service_registrations.apart_id', '=', Auth::user()->apart_id)
            ->where('services.type', 'sub')
            ->select('services.*')
            ->distinct()
            ->get();
        return view('resident.service.registration.enrolled', ['services' => $services]);
    }



    public function destroy($id)
    {
        try {
            Service::find($id);

            ServiceRegistration::where('apart_id', '=', Auth::user()->apart_id)->where('service_id', '=', $id)->first()->delete();

            return back()->with('success', 'Hủy dịch vụ hoàn tất!');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }
    }

}
