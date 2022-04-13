<?php

namespace App\Http\Controllers;

// use App\Models\Users;
// use App\Models\UserPr;

use App\Models\User;
use App\Models\UserProfile as ModelsUserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use UserProfile;
use App\Http\Controllers\Image;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // dd($userprofile);
        $useredit = Auth::user();
        // dd($useredit);
        return view('userprofile', compact('useredit'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $usereditid = Auth::user()->id;
       
        $validatedData = $request->validate([
            'profile_photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

        ]);

       

        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(storage_path('app/public/images'), $filename);
        }
        // dd($filename);
        $data = [
            'user_id' => $usereditid,
            'gender' => $request->gender,
            'address' => $request->address,
            'profile_photo' => $filename,
            'birth_date' => $request->birth_date
        ];




        $result = ModelsUserProfile::create($data);
        $userprofile = ModelsUserProfile::find($result->id);
        
        return view('userprofileshow', compact(['result', 'userprofile']));
    }

    
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $useredit = Auth::user();
        $useredit1 = ModelsUserProfile::findOrFail($id);
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
        $userid = ModelsUserProfile::findOrFail($id);

        // dd($userid);

        if ($request->file('profile_photo')) {
            $file = $request->file('profile_photo');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move('public', $filename);
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
        return view('userprofileupdateshow',compact(['useredit','userid']));


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
