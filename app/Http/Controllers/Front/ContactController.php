<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return View('Front.contact.index');
    }

    public function sendmessage(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'name' => 'nullable|string',
            'message' => 'required|string'
        ]);
        message::create($data);
        return back()->with('message', 'sent successfully!');
    }
}
