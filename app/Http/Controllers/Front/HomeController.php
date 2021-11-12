<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\subscribe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['articles'] = article::select('id', 'category_id', 'title', 'img', 'date')->orderBy('id', 'desc')->take(9)->get();
        return View('Front.index')->with($data);
    }

    public function subscribe(Request $request)
    {
        $data = $request->validate([
            'email' => 'required|email|unique:subscribes'
        ]);
        subscribe::create([
            'email' => $data['email']
        ]);
        return back();
    }

    public function login()
    {
        return View('login');
    }
}
