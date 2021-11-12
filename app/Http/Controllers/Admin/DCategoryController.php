<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class DCategoryController extends Controller
{
    public function index()
    {
        $data['categories'] = category::get();
        return View('Admin.Category.index')->with($data);
    }

    public function create()
    {
        return View('Admin.category.create');
    }

    public function store(Request $request)
    {
        $result = $request->validate([
            'name' => 'required|string'
        ]);
        category::create([
            'name' => $request->name
        ]);
        return redirect(route('DCategory.index'));
    }

    public function edit($id)
    {
        $data['category'] = category::findOrFail($id);
        return View('Admin.category.edit')->with($data);
    }

    public function update(Request $request)
    {
        $result = $request->validate([
            'name' => 'required|string'
        ]);
        category::findOrFail($request->id)->update($result);
        return redirect(route('DCategory.index'));
    }

    public function delete($id)
    {;
        category::findOrFail($id)->delete();
        return redirect(route('DCategory.index'));
    }
}
