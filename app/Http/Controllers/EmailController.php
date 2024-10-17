<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; 

class EmailController extends Controller
{

    public function showForm()
    {

        return view('send-email');

    }

    public function sendEmail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $emailData = [
            'email' => $request->email,
            'subject' => $request->subject,
            'title' => $request->title,
            'body' => $request->body,
        ];

        SendEmailJob::dispatch($emailData);

        return response()->json(['message' => 'Email will be sent shortly.'], 200);
    }
}


?>