<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\User;

class PostsController extends Controller
{
    public function  index(Request $request)
    {
        $term = $request->input('term');
        $users = User::with('role')
        ->when($term, function ($query, $term) {
            $query->where('name', 'LIKE', '%' . $term . '%')
                ->orWhere('email', 'LIKE', '%' . $term . '%');
        })
        ->latest()
        ->paginate(5);
        return Inertia::render('Admin/Posts/Index', compact('users'));
    }
}
