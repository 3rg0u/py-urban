<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Resident;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use function GuzzleHttp\is_host_in_noproxy;

class ResidentInforController extends Controller
{
    //

    public function index()
    {
        $aparts = Apartment::all();
        return view('admin.resident.information.index', ['aparts' => $aparts]);
    }

    public function create()
    {
        $aparts = Apartment::all();
        return view('admin.resident.information.create', ['aparts' => $aparts]);
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'id' => 'required|unique:residents',
                'name' => 'required',
                'apart_id' => 'required',
                'host' => 'required'
            ]
        );
        if ($data['host'] == 'host' && self::_hostChecking($data['apart_id'])) {
            return back()->withErrors(['host' => 'Chủ hộ của ' . $data['apart_id'] . ' đã tồn tại!']);
        }
        Resident::create(
            [
                'id' => $data['id'],
                'name' => $data['name'],
                'apart_id' => $data['apart_id'],
                'host' => $data['host']
            ]
        );

        return back()->with('success', 'Thêm cư dân thành công!');
    }


    public function show($id)
    {
        $residents = Resident::where('apart_id', operator: $id)->get();
        $aparts = Apartment::all();
        return view('admin.resident.information.show', ['residents' => $residents, 'aparts' => $aparts]);
    }


    public function update(Request $request, $id)
    {
        try {
            $resident = Resident::findOrFail($id);
            $data = $request->validate(
                [
                    'id' => 'required',
                    'name' => 'required',
                    'apart_id' => 'required',
                    'host' => 'required'
                ]
            );
            if ($data['host'] == 'host' && self::_hostChecking($data['apart_id'])) {
                return back()->withErrors(['host' => 'Chủ hộ của ' . $data['apart_id'] . ' đã tồn tại!']);
            }
            $resident->fill($data);
            $resident->update($resident->getDirty());
            return back()->with('success', 'Cập nhật mật khẩu thành cống');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => "ID không hợp lệ"]);
        }
    }

    public function destroy($id)
    {
        try {
            $account = Resident::findOrFail($id);
            $account->delete();
            return back()->with('success', 'Xóa cư dân hoàn tất!');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }
    }



    private static function _hostChecking($apart_id)
    {
        return Resident::where('apart_id', '=', $apart_id)->where('host', '=', 'host')->exists();
    }
}
