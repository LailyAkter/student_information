<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Str;
use App\User;
use Auth;
use Carbon\Carbon;
use Storage;
use Image;
use Brian2694\Toastr\Facades\Toastr;
use Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings.profile');
    }

    public function update(Request $request){
         $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'image' => 'required|image',
        ]);
        $image = $request->file('image');
        $slug = Str::slug($request->name);
        $user = User::findOrFail(Auth::id());
        if (isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imageName = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            if (!Storage::disk('public')->exists('avatar'))
            {
                Storage::disk('public')->makeDirectory('avatar');
            }
            // Delete old image form Avatar folder
            if (Storage::disk('public')->exists('avatar/'.$user->image))
            {
                Storage::disk('public')->delete('avatar/'.$user->image);
            }
            $avatar = Image::make($image)->resize(500,500)->stream();
            Storage::disk('public')->put('avatar/'.$imageName,$avatar);

            // Avatar Slider
            if (!Storage::disk('public')->exists('avatar/slider'))
            {
                Storage::disk('public')->makeDirectory('avatar/slider');
            }
            // Delete old image form Avatar Slider folder
            if (Storage::disk('public')->exists('avatar/slider/'.$user->image))
            {
                Storage::disk('public')->delete('avatar/slider/'.$user->image);
            }
            $avatar_image = Image::make($image)->resize(1600,1066)->stream();
            Storage::disk('public')->put('avatar/slider/'.$imageName,$avatar_image);
        } else {
            $imageName = $user->image;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imageName;
        $user->save();

        Toastr::success('Profile Updated Successfully','Success');

        return redirect('admin/dashboard');
    }

    public function password()
    {
        return view('admin.settings.password');
    }

    public function password_update(Request $request)
    {
         $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed:password_confirmation'
        ]);

        $hasedPassword = Auth::user()->password;

        if(Hash::check($request->old_password,$hasedPassword)){
            if(!Hash::check($request->password,$hasedPassword)){
                $user = User::findOrFail(Auth::id());
                $user->password = Hash::make($request->password);
                $user->save();

                Toastr::success('Password Updated Successfully','Success');
                Auth::logout();
            }else{
                Toastr::error('New Password Can not be Same as Old Password','Error');
            }
        }else{
            Toastr::error('Current Password Not Match','Error');
        }
        return redirect()->back();
    }
}
