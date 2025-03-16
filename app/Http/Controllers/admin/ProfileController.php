<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Apartment;
use App\Models\Manager;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', ['user' => $user]);
    }


    public function updateEmail(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $data = $request->validate([
                'email' => 'required|unique:users'
            ]);
            $user->update(
                [
                    'email' => $data['email']
                ]
            );

            return back()->with('success', 'Cập nhật email hoàn tất!');
        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }
    }


    public function updatePassword(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $data = $request->validate([
                'old_pass' => 'required',
                'new_pass' => 'required',
                'new_pass_confirmation' => 'required'
            ]);

            if (!Hash::check($data['old_pass'], $user->password)) {
                return back()->withErrors(['password' => 'Mật khẩu cũ không đúng']);
            }


            $user->update(
                [
                    'password' => Hash::make($data['new_pass'])
                ]
            );

            return back()->with('success', 'Cập nhật mật khẩu hoản tất!');

        } catch (ModelNotFoundException $exc) {
            return back()->withErrors(['id' => 'ID không hợp lệ!']);
        }
    }
}
