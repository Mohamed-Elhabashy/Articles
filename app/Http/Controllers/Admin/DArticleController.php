<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\article;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

class DArticleController extends Controller
{
    public function ListArticle($id)
    {
        $data['articles'] = article::where('category_id', $id)->paginate(9);
        return View('Admin.Article.ListArticle')->with($data);
    }

    public function create()
    {
        $data['categories'] = category::get();
        return View('Admin.Article.create')->with($data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'img' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $new_img_name = $data['img']->hashName();
        Image::make($data['img'])->resize(640, 450)->save(public_path('Uploads/'.$new_img_name));
        $data['img'] = $new_img_name;
        $data['date'] = date('Y-m-d');
        article::create($data);
        return back()->with('message', 'Added successfully!');
    }

    public function edit($id)
    {
        $data['categories'] = category::get();
        $data['article'] = article::findOrFail($id);
        return View('Admin.Article.edit')->with($data);
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'id' => 'required|exists:articles,id',
            'title' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'content' => 'required|string',
            'img' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);
        $a = article::findOrFail($request->id);
        $old_name = $a->img;
        if ($request->hasFile('img')) {
            Storage::disk('Uploads')->delete($old_name);
            $new_img_name = $data['img']->hashName();
            Image::make($data['img'])->resize(640, 450)->save(public_path('Uploads/'.$new_img_name));
            $data['img'] = $new_img_name;
        } else {
            $data['img'] = $old_name;
        }
        $data['date'] = $a->date;
        article::findOrFail($request->id)->update($data);
        return back()->with('message', 'Edit successfully!');
    }

    public function delete($id)
    {
        $old_name = article::findOrFail($id)->img;
        Storage::disk('Uploads')->delete($old_name);
        article::findOrFail($id)->delete();
        return back();
    }
}
