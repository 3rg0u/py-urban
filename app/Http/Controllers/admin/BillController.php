<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Bill;
use App\Models\Manager;
use App\Models\PaidBill;
use App\Models\Service;
use App\Models\ServiceRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    //

    public function index()
    {
        $bills = Bill::all();
        return view('admin.bill.index', ['bills' => $bills]);
    }


    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required',
            ]
        );
        $date = now();
        $creator_id = Manager::where('email', '=', Auth::user()->email)->first()->id;

        // dd($creator_id);
        $bill = Bill::create(
            [
                'name' => $data['name'],
                'creator_id' => $creator_id,
                'create_date' => $date
            ]
        );
        $aparts = Apartment::all();
        foreach ($aparts as $apart) {
            $price = 0;
            $price += self::_calcApartRent($apart->id);
            $price += self::_calcFixedService();
            $price += self::_calcSubService($apart->id);
            // dd($price);
            PaidBill::create(
                [
                    'paid_date' => null,
                    'bill_id' => $bill->id,
                    'apart_id' => $apart->id,
                    'state' => false,
                    'price' => $price,
                ]
            );
        }
        return back()->with('success', 'Tạo hóa đơn hòan tất');
    }


    public function show($id)
    {
        $paid_bills = PaidBill::where('bill_id', '=', $id)->get();
        return view('admin.bill.show', ['paid_bills' => $paid_bills]);
    }


    private static function _calcApartRent($apart_id)
    {
        return Service::where('name', '=', 'Phi thue nha (theo m2)')->first()->price * Apartment::find($apart_id)->area;
    }

    private static function _calcFixedService()
    {
        $services = Service::where('type', '=', 'sub')
            ->where('name', '!=', 'Phi thue nha (theo m2)')->get();
        $sum = 0;
        foreach ($services as $service) {
            $sum += $service->price;
        }
        return $sum;
    }


    private static function _calcSubService($apart_id)
    {
        $services = ServiceRegistration::where('apart_id', '=', $apart_id)->get();
        $sum = 0;
        foreach ($services as $service) {
            $sum += $service->price;
        }
        return $sum;
    }
}
