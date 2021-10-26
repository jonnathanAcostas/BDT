<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UserController extends Controller
{
    function register(Request $req)
    {
        $name = $req->input('name');
        $lastname = $req->input('lastname');
        $offer = $req->input('offer');
        $email = $req->input('email');
        $phonenumber = $req->input('phonenumber');
        $saldo = $req->input('saldo');
        $password = Hash::make($req->input('password'));
        DB::table('users')->insert([
            'name' =>   $name,
            'last_name'=>$lastname,
            'offer'=>$offer,
            'email' =>  $email ,
            'phone_number'=>$phonenumber,
            'saldo'=>$saldo,
            'password'=> $password
          ]);
          
    }
    function login(Request $req)
    {
        $email =  $req->input('email');
        $password = $req->input('password');
 
        $user = DB::table('users')->where('email',$email)->first();
        if(!Hash::check($password, $user->password))
        {
           alert( "Not Matched");
        }
        else
        {
            //$user = DB::table('users')->where('email',$email)->first();
           echo $user->email;
        }
    }

    public function index(){
        $users = User::all();

        return response()->json([
            'status'=>200,
            'users' => $users,
        ]);
    }

public function edit($id)
{
    $user = User::find($id);
    return response()->json([
    'status'=> 200,
    'user' => $user,
]);
}


public function update(Request $request, $id){
    $user = User::find($id);
    $user -> name = $request ->input('name');
    $user -> last_name = $request ->input('last_name');
    $user -> offer = $request ->input('offer');
    $user -> email = $request ->input('email');
    $user -> phone_number = $request ->input('phone_number');
   
    $user-> update();


    return response()->json([
        'status'=>200,
        'message'=> 'Usuario actualizado correctamente',
    ]);
}

public function destroy($id)
{
 $user = User::find($id);
 $user ->delete();

 return response()->json([
    'status'=>200,
    'message'=> 'Usuario eliminado correctamente',
]);

}

}
