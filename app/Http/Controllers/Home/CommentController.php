<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {

    }

    public function discussArticle(Request $request)
    {
        $this->validate($request, [
            'nickname' => 'required|max:20',
            'email' => 'required|email|max:60',
            'content' => 'required',
        ]);
    }
}
