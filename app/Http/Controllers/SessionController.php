<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function login()
    {
        return view('sesi/logindanregister');
    }

    public function loggin(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            $user = Auth::user();
            if ($user->usertype === 'admin') {
                return redirect()->route('page.admin-dashboard')->with('success', 'Selamat Datang, ' . Auth::user()->name);
            } else {
                return redirect('/')->with('success', 'Selamat Datang, ' . Auth::user()->name);
            }
        } else {
            return redirect('sesi')->withErrors(['loginError' => 'Username dan password yang dimasukkan tidak valid']);
        }
    }

    // function register()
    // {
    //     return view('sesi/register');
    // }

    function create(Request $request)
    {
        Session::flash('name', $request->name);
        Session::flash('number', $request->number);
        Session::flash('email', $request->email);
        $request->validate([
            'name' => 'required',
            'number' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'name.required' => 'Nama wajib diisi',
            'number.required' => 'Nomor wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Masukkan email yang valid',
            'email.unique' => 'Email sudah pernah digunakan',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Minimum 8 karakter'
        ]);

        $data = [
            'name' => $request->name,
            'number' => $request->number,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            return redirect('/')->with('success', 'Berhasil Registrasi dan Login sebagai ' . Auth::user()->name);
        } else {
            return redirect('sesi')->withErrors(['registerError' => 'Registrasi berhasil, namun terjadi kesalahan saat login otomatis']);
        }
    }

    public function profile()
    {
        return view('page.profile');
    }


    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:255',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        /** @var \App\Models\User $user **/
        $user = Auth::user();
        $user->name = $request->name;
        $user->number = $request->number;
        if ($request->hasFile('profile_image')) {
            $profileImage = $request->file('profile_image');
            $profileImageName = time() . '.' . $profileImage->getClientOriginalExtension();
            $profileImage->move(public_path('images/profile'), $profileImageName);

            // delete old profile image if exists
            if ($user->profile_image) {
                $oldImagePath = public_path('images/profile/' . $user->profile_image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            $user->profile_image = $profileImageName;
        }
        $user->save();

        return redirect()->route('profile')->with('message', 'Profile berhasil diperbarui');
    }

    public function changeProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images/profile');
            $image->move($destinationPath, $name);
            /** @var \App\Models\User $user **/
            $user->profile_image = $name;
            $user->save();
        }

        return redirect()->route('profile')->with('message', 'Foto profile berhasil diganti');
    }

    public function password()
    {
        return view('page.editpassword');
    }

    public function changePassword(Request $request)
    {
        // Mengimpor aturan Password yang benar dari Laravel
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::min(8)],

        ]);
        $user = Auth::user();

        // Verifikasi password saat ini
        if (!Hash::check($validated['current_password'], $user->password)) {
            return back()->withErrors(['current_password' => 'Password tidak sesuai.'])->withInput();
        }

        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('profile')->with('message', 'Ganti password telah berhasil.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
