<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {
        return DB::transaction(function () use ($request) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password =Hash::make($request->password);
            $user->email_verified_at = now();
            $user->save();

            $user->assignRole(config('permission.available_roles.user'));
 
            return redirect()->route('user.page');
        });
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    public function gantiPassword(){
        $user = User::where('id', '=', auth()->id())->first();

        return view('gantiPassword', compact('user'));
    }

    public function gantiPasswordUpdate(Request $request){
        $this->validate($request, 
        [
            'name' => 'required',
            'email' => 'required',
            'password' => '',
            'id'    => 'required'
        
        ],
        $messages = 
        [
            'name.required' => "Nama harus diisi.",
            'email.required' => "Email harus diisi.",

        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        if (isset($request->password)) {
            $user->password =Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('gantiPassword')->with(['success' => 'Data berhasil diubah']);
    }

}
