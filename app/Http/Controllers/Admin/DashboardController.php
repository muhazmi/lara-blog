<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

class DashboardController extends Controller
{

    public function index()
    {
        $data = [
            'page_title'        => 'Dashboard',
            'total_posts'       => Post::getTotalRows(),
            'total_categories'  => Category::getTotalRows(),
            'total_tags'        => Tag::getTotalRows(),
            'total_users'       => User::getTotalRows(),

        ];

        return view('backend/dashboard/index', $data);
    }
}
