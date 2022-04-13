<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\VerifyEmail;
use App\Models\User;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\hash;
// use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('Users');
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
    public function store(UserRequest $request)
    {
        $user_input = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];


        $data=User::create($user_input);
        if ($data) {
            $verify2 = DB::table('users')->where([
                ['email', $request->all()['email']]
            ]);

            if ($verify2->exists()) {
                $verify2->delete();
            }

            $pin = rand(100000, 999999);
            DB::table('users')->insert([
                'name' => $request->name,
                'email' => $request->all()['email'],
                'password' => Hash::make($request->password),
                'remember_token' => $pin
            ]);


        }
        // dd($pin);
        

        Mail::to($request->email)->send(new VerifyEmail($pin));
        // dd($data);
        $token = $data->createToken('myapptoken')->plainTextToken;

        return new JsonResource(
            [
                'success' => true,
                'message' => 'Successful created user. Please check your email for a 6-digit pin to verify your email.',
                'remember_token' => $token
            ],
            201
        );

       

        // return redirect('login');
    }

    public function verifyEmail(Request $request)
    {
        $validator = Validation::make($request->all(), [
            'remember_token' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with(['message' => $validator->errors()]);
        }
        $select = DB::table('users')
            ->where('email', Auth::user()->email)
            ->where('remember_token', $request->token);

        if ($select->get()->isEmpty()) {
            return new JsonResponse(['success' => false, 'message' => "Invalid PIN"], 400);
        }

        $select = DB::table('users')
            ->where('email', Auth::user()->email)
            ->where('remember_token', $request->token)
            ->delete();

        $user = User::find(Auth::user()->id);
        $user->email_verified_at = Carbon::now()->getTimestamp();
        $user->save();

        return new JsonResponse(['success' => true, 'message' => "Email is verified"], 200);
    }

    public function resendPin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validator->fails()) {
            return new JsonResponse(['success' => false, 'message' => $validator->errors()], 422);
        }

        $verify =  DB::table('users')->where([
            ['email', $request->all()['email']]
        ]);

        if ($verify->exists()) {
            $verify->delete();
        }

        $token = random_int(100000, 999999);
        $password_reset = DB::table('users')->insert([
            'email' => $request->all()['email'],
            'token' =>  $token,
            'created_at' => Carbon::now()
        ]);

        if ($password_reset) {
            Mail::to($request->all()['email'])->send(new VerifyEmail($token));

            return new JsonResponse(
                [
                    'success' => true,
                    'message' => "A verification mail has been resent"
                ],
                200
            );
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        //
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
        //
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


    public function logout()
    {

        Auth::logout();
        return redirect('login');
    }

    public function build()
    {
        return $this
            ->subject("Email Verification")
            ->markdown('emails.verify');
    }
}
