<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('agent.dashboard');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome()
    {
        $data['pending_articles'] = Article::where(['is_approved' => 0, 'is_delete' => '0', 'created_by' => auth()->user()->id])->get();
        $data['pending_users'] = User::where(['is_approved' => 0, 'is_delete' => '0', 'is_assign' => auth()->user()->id])->get();
        $data['total_articles'] = Article::where(['is_delete' => '0', 'created_by' => auth()->user()->id])->get();
        $data['total_users'] = User::where(['is_delete' => '0', 'is_assign' => auth()->user()->id])->get();

        return view('manager.dashboard', $data);
    }
}
