<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Mail\SendSubscribe;
use App\Models\subscribe;
use App\Models\SubscribeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailSubscribeController extends Controller
{
    public function index()
    {
        $data['mails'] = SubscribeMail::OrderBy('id', 'desc')->get();
        return View('Admin.Email.index')->with($data);
    }

    public function SendMail()
    {
        return View('Admin.Email.SendMails');
    }

    public function SubmitSendMail(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'body' => 'required|string'
        ]);
        $details = [
            'title' => $data['title'],
            'body' => $data['body']
        ];
        SubscribeMail::create([
            'title' => $data['title'],
            'body' => $data['body']
        ]);
        $subscribes = subscribe::get();
        foreach ($subscribes as $s) {
            $details['email'] = $s['email'];
            //Mail::to($s['email'])->send(new SendSubscribe($data['title'], $data['body']));
            dispatch(new SendEmailJob($details));
        }
        return back()->with('message', 'Send Successfully');
    }

    public function delete($id)
    {
        SubscribeMail::findOrFail($id)->delete();
        return back();
    }
}
