<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserProfileController extends Controller
{

    public function index()
    {

        // dd($userprofile);
        $useredit = Auth::user();
        // dd($useredit);
        return view('userprofile', compact('useredit'));
    }

    public function store(UserProfileRequest $request)
    {

        $usereditid = Auth::user()->id;

        $validatedData = $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);



        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images/'), $filename);
        }
        // dd($filename);
        $data = [
            'user_id' => $usereditid,
            'gender' => $request->gender,
            'address' => $request->address,
            'profile_photo' => $filename,
            'birth_date' => $request->birth_date
        ];

        $result = UserProfile::create($data);
        $userprofile = UserProfile::find($result->id);
        $authusername = Auth::user();
        // dd($authusername);

        return view('userprofileshow', compact(['result', 'userprofile', 'authusername']));
    }


    public function edit($id)
    {

        $useredit = Auth::user();
        $useredit1 = UserProfile::findOrFail($id);
        return view('userprofileupdate', compact(['useredit', 'useredit1']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $useredit = Auth::user();
        $userid = User::find($id)->usersprofile;
// return $id;
        // dd($userid);

        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images/'), $filename);
        }

        $updatedata = [
            // 'user_id' => $userprofile,
            'gender' => $request->gender,
            'address' => $request->address,
            'profile_photo' => $filename,
            'birth_date' => $request->birth_date
        ];


        $userid->update($updatedata);
        // dd($userid);
        // $userprofile = ModelsUserProfile::find($result->id);
        // dd($userid);
        // dd($userid);
        return view('userprofileupdateshow', compact(['useredit', 'userid']));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
