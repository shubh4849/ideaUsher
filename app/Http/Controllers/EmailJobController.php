<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailJob;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EmailJobController extends Controller
{

    public function index(Request $request)
    {
        $limit = $request->input('length') ?? 10;
        $start = $request->input('start') ?? 0;

        $users = User::where('id', '!=', Auth::id())->offset($start)
            ->limit($limit)
            ->get();

        $data = [];
        foreach ($users as $user) {
            $emailStatus = $this->getEmailStatus($user->email);
            $data[] = [
                'name' => $user->name,
                'email' => $user->email,
                'address' => $user->address,
                'status' => $emailStatus,
            ];
        }

        return response()->json([
            'recordsTotal' => User::count(),
            'recordsFiltered' => User::count(),
            'data' => $data,
        ]);
    }

    private function getEmailStatus($email)
    {
        $emailJob = DB::table('email_jobs')
            ->where('recipient_email', $email)
            ->first();
        if ($emailJob) {
            if ($emailJob->status === 'queued') {
                return 'queued';
            } elseif ($emailJob->status === 'processing') {
                return 'processing';
            } elseif ($emailJob->status === 'sent') {
                return 'sent';
            } elseif ($emailJob->status === 'failed') {
                return 'failed';
            }
        }
        return 'No Email Sent';
    }
    
}
