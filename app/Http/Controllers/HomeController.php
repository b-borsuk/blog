<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publication;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return View
     */
    public function index()
    {
        $publications = Publication::active()->orderBy('updated_at', 'DESC')
            ->limit(12)->get();

        return view('blog.home', [
            'publications' => $publications,
        ]);
    }
}
