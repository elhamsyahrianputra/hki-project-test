<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Profile\UploadImageRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;

class ProfileController extends Controller
{
    public function profile() {
        return view('dashboard.settings.profile', [

        ]);
    }

    public function update(UpdateProfileRequest $request) {
        $validatedData = $request->validated();

        User::find(auth()->user()->id)->update($validatedData);
        return redirect('/settings/profile')->with('updateProfile', 'Data Profil Berhasil di Ubah');
    }

    public function uploadImage(UploadImageRequest $request) {
        $validatedData = $request->validated();

        
        if ($request->file('photo_url')) {
            if ($request->old_photo !== 'default/avatar_default.jpg') {
                Storage::delete($request->old_photo);
            }
            $validatedData['photo_url'] = $request->file('photo_url')->store('user/photo-profile');
        }
        
        User::find(auth()->user()->id)->update($validatedData);

        return redirect('/settings/profile')->with('updateProfile', 'Foto Profil Berhasil di Ubah');
    }

    
    public function account() {
        return view('dashboard.settings.account', [

        ]);
    }
}
