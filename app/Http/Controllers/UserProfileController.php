<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

        $usereditid = Auth::id();
        // return $usereditid;



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
        // File::delete(storage_path('app/public/images/').$request->file('profile_photo'));

        $useredit = Auth::user();
        $userid = User::find($id)->usersprofile;


        $data = User::find(Auth::id())->usersprofile->name;

        // dd($data);


        // return $id;
        // dd($userid);

        $updatedata = [
            // 'user_id' => $userprofile,
            'gender' => $request->gender,
            'address' => $request->address,

            'birth_date' => $request->birth_date
        ];

        if($request->hasFile('profile_photo'))
        {
            $file = $request->file('profile_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images/'), $filename);
            $updatedata['profile_photo']=$filename;
        }
// return $updatedata;



        $userid->update($updatedata);
        // dd($userid);
        // $userprofile = ModelsUserProfile::find($result->id);
        // dd($userid);
        // dd($userid);
        $authusername = Auth::user();

        return view('userprofileupdateshow', compact(['useredit', 'userid','authusername','data']));
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
