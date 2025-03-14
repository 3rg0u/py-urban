<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Service;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ServicePernamentController extends Controller
{
    public function index()
    {
        $fixed_services = Service::where('type', 'fixed')->get();
        return view('admin.service.pernament.index', ['services' => $fixed_services]);
    }


    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'name' => 'required|string',
                'price' => 'required|numeric|min:10000'
            ]
        );
        Service::create(
            [
                'name' => $data['name'],
                'price' => $data['price'],
                'type' => 'fixed'
            ]
        );
        return back()->with('success', 'Thêm dịch vụ thành công');
    }



    public function update(Request $request, $id)
    {
        try {
            $service = Service::findOrFail($id);
            $data = $request->validate([
                'name' => 'required|string',
                'price' => 'required|numeric|min:10000'
            ]);
            $service->update(
                [
                    'name' => $data['name'],
                    'price' => $data['price']
                ]
            );
            return back()->with('success', "Cập nhật thông tin dịch vụ thành công!");
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID của dịch vụ không hợp lệ!']);
        }
    }

    public function destroy($id)
    {
        try {
            $service = Service::findOrFail($id);
            $service->delete();
            return back()->with('success', 'Hủy dịch cung cấp dịch vụ thành công!');

        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID của dịch vụ không hợp lệ!']);

        }
    }
}
