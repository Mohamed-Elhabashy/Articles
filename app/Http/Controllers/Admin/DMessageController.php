<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\message;

class DMessageController extends Controller
{
    public function index()
    {
        $data['messages'] = message::OrderBy('id', 'desc')->get();
        return View('Admin.message.index')->with($data);
    }

    public function delete($id)
    {
        message::findOrFail($id)->delete();
        return back();
    }
}
