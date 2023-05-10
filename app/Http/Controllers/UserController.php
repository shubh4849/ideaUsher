<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
use DataTables;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->except('_token','password_confirmation');
            $password = Hash::make($data['password']);
            $data['password'] = $password;
            $user =  User::create($data);
            Auth::login($user);
            return redirect("/qrcode");
        }
        return view('register');
    }

    public function generateQRCode()
    {
        $user = auth()->user();
        $qrCode = QrCode::size(300)
            ->generate("Name: {$user->name}, Email: {$user->email}, ID: {$user->id}");
        return view('qrcode', ['qrCode' => $qrCode]);
    }

    public function emailCheck(Request $request)
    {   
        $data = $request->all();
        if(isset($data['email'])){
            $user = User::where(['email'=>$data['email']])->first();
        }
        if(empty($user)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $limit = $request->input('length');
            $start = $request->input('start');
            
            $users = User::offset($start)
                ->limit($limit)
                ->get();
                
            $data = [];
            foreach ($users as $user) {
                $data[] = [
                'name' => $user->name,
                'email' => $user->email,
                'image' => $user->profile_image,
                'action' => "<button  data-id='$user->id' class='btn btn-xs btn-primary editBtn'>Edit</button>"
                ];
            }
            
            return response()->json([
                'draw' => $request->input('draw'),
                'recordsTotal' => User::count(),
                'recordsFiltered' => User::count(),
                'data' => $data,
            ]);
        }
        return view('users');
    }

    public function edit($user)
    {
        $user = User::where('id', $user)->first();
        return response()->json($user);
    }

    public function updateUser(Request $request)
    {
        $data = $request->except('_token');
        $image = $request->file('profile_image');
        if(isset($image)) {
            $random = rand(100000,999999);
            $rightimage = time().'r'.$random.'.'.$request['profile_image']->getClientOriginalExtension();
            $destination_path = userImage;
            $image->move($destination_path,$rightimage);
            $data['profile_image'] = $rightimage;
        }
        User::where('id', $request['id'])->update($data);
        return redirect()->back();
    }
}
