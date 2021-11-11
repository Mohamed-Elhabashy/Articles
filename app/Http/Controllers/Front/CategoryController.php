<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\article;

class CategoryController extends Controller
{
    public function show($id)
    {
        $data['articles'] = article::where('category_id', $id)->paginate(9);
        return View('Front.category.show')->with($data);
    }
}
