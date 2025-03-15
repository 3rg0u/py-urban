<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resident;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use App\Models\Apartment;
class ResidentAccountController extends Controller
{    //
    public function index()
    {
        $data = User::where('role', 'resident')->get();
        return view('admin.resident.account.index', ['accounts' => $data]);
    }
    public function create()
    {
        $aparts = Apartment::leftJoin('users', 'apartments.id', '=', 'users.apart_id')


            ->whereNull('users.apart_id')->get(['apartments.id']);
        return view('admin.resident.account.create', ['aparts' => $aparts]);
    }
    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'email' => 'required|unique:users',
                'password' => 'required',
                'password_confirmation' => 'required',
                'apart_id' => 'required'
            ]
        );
        if ($data['password'] != $data['password_confirmation']) {
            return back()->withErrors(['password' => 'Mật khẩu không trùng khớp']);
        }
        User::create([
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'apart_id' => $data['apart_id'],
            'role' => 'resident'
        ]);
        return back()->with('success', 'Tạo tài khoản thành công!');
    }
    public function edit($id)
    {
        try {
            $account = User::findOrFail($id);
            $aparts = Apartment::leftJoin('users', 'apartments.id', '=', 'users.apart_id')


                ->whereNull('users.apart_id')->get(['apartments.id']);
            return view('admin.resident.account.edit', ['account' => $account, 'aparts' => $aparts]);
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => "ID không hợp lệ"]);
        }
    }
    public function updatePassword(Request $request, $id)
    {
        try {
            $account = User::findOrFail($id);
            $data = $request->validate(
                [
                    'password' => 'required|min:8',
                    'password_confirmation' => 'required|min:8'
                ]
            );
            if ($data['password'] != $data['password_confirmation']) {
                return back()->withErrors(['password' => "Mật khẩu không trùng khớp"]);
            }
            $account->update(
                [
                    'password' => Hash::make($data['password'])
                ]
            );
            return back()->with('success', 'Cập nhật mật khẩu thành cống');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => "ID không hợp lệ"]);
        }
    }
    public function updateInfor(Request $request, $id)
    {
        try {
            $account = User::findOrFail($id);
            $data = $request->validate(
                [
                    'email' => 'required',
                    'apart_id' => 'required'
                ]
            );
            $account->fill($data);
            $account->update($account->getDirty());
            return back()->with('success', 'Cập nhật mật khẩu thành cống');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => "ID không hợp lệ"]);
        }
    }


    public function destroy($id)
    {
        try {
            $account = User::findOrFail($id);
            $account->delete();
            return back()->with('success', 'Xóa tài khoản hoàn tất!');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }
    }
}
