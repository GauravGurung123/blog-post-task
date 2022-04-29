<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function edit($profile)
    {
        $user = User::where('id', $profile)->with('images')->first();
        return view('profiles.edit', compact('user') );
    }

    public function update(Request $request, $id){

    try {
            
        $user = User::findOrFail($id);

        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => 'required',Rule::unique('users', 'email')->ignore($user->id),            
        
        ]);
        
        
        $user->update($validatedData);
        if ($request->image !=null) {
            
            $validated = $request->validate(['image' => ['nullable', 'mimes:jpg,png,jpeg', 'max:6048']]);
                        
            if(isset($request->image)) {
                $imgName = time().$request->image->getClientOriginalName();
                $request->image->move(public_path('images/avatars'), $imgName);
                $validated['path'] = 'images/avatars/'.$imgName;
            }else{
                $validated['path'] = '/images/avatars/01.png';
            }

            DB::table('images')
            ->where('imageable_id', $id)
            ->update(['path' => $validated['path']]);
        }
        

    } catch (\Throwable $th) {
        return back()->with('error', 'Profile Update Failed!');
    }
    return back()->with('success', 'Profile Updated Successfuly');
}

    public function changePassword(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'current_password' => ['required', new MatchOldPassword],
                'new_password' => ['required','min:4'],
                'new_cpassword' => ['same:new_password'],
            ]);

            $user->update(['password'=>Hash::make($request->new_password)]);

        } catch (\Throwable $th) {
            return back()->with(['error' => 'Update Failed! try again with your correct credential! ']);            
        }

        return redirect()->back()->with(['success' => 'Password Changed Successfully']);
    }



}
