<?php

namespace App\Http\Controllers\Control;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Publications\AddRequest;
use App\Http\Requests\Publications\EditRequest;
use App\Publication;
use Auth;

class PublicationsController extends Controller
{
    /**
     *
     * @return View
     */
    public function index()
    {
        $publications = Publication::orderBy('updated_at', 'DESC')->paginate(20);

        return view('control.publications.list', [
            'publications' => $publications,
        ]);
    }

    /**
     *
     * @return View
     */
    public function add()
    {
        return view('control.publications.add');
    }

    /**
     *
     * @param  Publication $publication
     * @return View
     */
    public function edit(Publication $publication)
    {
        return view('control.publications.edit', [
            'publication' => $publication,
        ]);
    }

    /**
     *
     * @param  AddRequest $request
     * @return View
     */
    public function create(AddRequest $request)
    {
        if (!$user = Auth::user()) {
            abort(403);
        }

        $user->publications()->create($request->all());

        return redirect()->route('controlPublications')
            ->withStatusMessage('Publication created!');
    }

    /**
     *
     * @param  Publication $publication
     * @param  EditRequest $request
     * @return View
     */
    public function update(Publication $publication, EditRequest $request)
    {
        $publication->fill($request->all());
        $publication->save();

        return redirect()->route('controlPublications')
            ->withStatusMessage('Publication updated!');
    }
}
