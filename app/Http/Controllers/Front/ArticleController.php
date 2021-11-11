<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\article;

class ArticleController extends Controller
{
    public function show($id)
    {
        $data['article'] = article::findOrFail($id);
        return View('Front.article.show')->with($data);
    }
}
