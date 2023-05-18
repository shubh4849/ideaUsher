<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\EmailJob;
use DataTables;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\DB;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\Exportable;


class UserController extends Controller
{
    use AuthenticatesUsers;


    public function register(Request $request)
    {
        if($request->isMethod('post')){
            $data = $request->except('_token','password_confirmation');
            $password = Hash::make($data['password']);
            $data['password'] = $password;
            $user =  User::create($data);
            return redirect("/login");
        }
        return view('register');
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

    
    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $subject = 'Welcome Email';
            $body = 'Thank you for logging in. This is new email!';

            try {
                $credentials = $request->only("email", "password");
                $user = User::where("email", $request->email)->first();
                $password = $user->password;
                if (Hash::check($request->password, $user->password)) {
                    if (
                        Auth::attempt([
                            "email" => $request->email,
                            "password" => $request->password,
                        ])
                    ) {

                        $otherUsers = User::where('id', '<>', Auth::id())->get();
                        EmailJob::truncate();
                        foreach ($otherUsers as $recipient) {
                            $emailStatus = EmailJob::insertGetId(['recipient_email'=>$recipient->email]);
                            dispatch(new SendEmailJob($subject, $body, $recipient->email, $emailStatus));
                        }

                        return redirect('/getUsers');
                    }
                }
                throw new \Exception(
                    "The provided credentials do not match our records."
                );
            } catch (\Exception $e) {
                return back()->withErrors([
                    "email" => $e->getMessage(),
                ]);
            }
        }
        return view('login');
    }

    public function index(Request $request)
    {
        return view('users');
    }

    public function logout()
    {
        Auth::logout();
        return redirect("/login")->with("success", "Logged out successfully!");
    }

    public function export(Request $request)
    {
        $columns = explode(',', $request->query('columns'));
        $fileFormat = $request->query('fileFormat');
        $fileName = $request->query('fileName');
        $users = User::select($columns)->where('id', '<>', Auth::id())->get();
        if ($fileFormat === 'csv') {
            return Excel::download(new UserExport($users, $columns), $fileName . '.csv', \Maatwebsite\Excel\Excel::CSV);
        } else {
            return Excel::download(new UserExport($users, $columns), $fileName . '.xlsx', \Maatwebsite\Excel\Excel::XLSX);
        }
    }
}
