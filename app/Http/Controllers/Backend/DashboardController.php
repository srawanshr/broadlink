<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use Carbon\Carbon;
use App\Models\Pin;
use App\Models\User;
use App\Models\Order;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $now = Carbon::now();

        $startOfWeek = Carbon::now()->startOfWeek()->subDay();

        $count['users'] = User::count();

        $count['pins'] = Pin::count();

        $count['orders'] = Order::latest()->whereDate('created_at', '>=', $startOfWeek)->whereDate('created_at', '<=', $now)->count();

        $count['posts'] = Post::latest()->whereDate('created_at', '>=', $startOfWeek)->whereDate('created_at', '<=', $now)->count();

        return view('backend.index', compact('count'));
    }
}
