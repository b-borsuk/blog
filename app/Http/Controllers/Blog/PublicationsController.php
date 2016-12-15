<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Publication;

class PublicationsController extends Controller
{
    /**
     *
     * @return View
     */
    public function index()
    {
        $publications = Publication::active()->orderBy('updated_at', 'DESC')
            ->paginate(20);

        return view('blog.publications.list', [
            'publications' => $publications,
        ]);
    }

    /**
     *
     * @param  Publication $publication
     * @return View
     */
    public function view(Publication $publication)
    {
        return view('blog.publications.view', [
            'publication' => $publication,
        ]);
    }
}
