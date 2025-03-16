<?php

namespace App\Http\Controllers\resident;

use App\Http\Controllers\Controller;
use App\Models\PaidBill;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BillController extends Controller
{
    //


    public function index()
    {
        $paid_bills = PaidBill::where('apart_id', '=', Auth::user()->apart_id)->get();
        return view('resident.bill.index', ['paid_bills' => $paid_bills]);
    }

    public function checkout($id)
    {
        try {
            $paid_bill = PaidBill::findOrFail($id);
            $paid_bill->update(
                [
                    'paid_date' => now(),
                    'state' => true
                ]
            );
            return back()->with('success', 'Thanh toán hóa đơn thành công!');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }
    }
}
