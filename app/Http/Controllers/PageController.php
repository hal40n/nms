<?php

namespace App\Http\Controllers;

use App\Models\Procedure;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Procedure $procedure)
    {
        $pages = $procedure->pages;
        return view('pages.index', compact('procedure', 'pages'));
    }

    public function show(Procedure $procedure, Page $page)
    {
        return view('pages.show', compact('procedure', 'page'));
    }

    public function create(Procedure $procedure)
    {
        return view('pages.create', compact('procedure'));
    }

    public function store(Request $request, Procedure $procedure)
    {
        $page = new Page($request->all());
        $procedure->pages()->save($page);
        return redirect()->route('procedures.pages.index', $procedure);
    }

    public function edit(Procedure $procedure, Page $page)
    {
        return view('pages.edit', compact('procedure', 'page'));
    }

    public function update(Request $request, Procedure $procedure, Page $page)
    {
        $page->update($request->all());
        return redirect()->route('procedures.pages.index', $procedure);
    }

    public function destroy(Procedure $procedure, Page $page)
    {
        $page->delete();
        return redirect()->route('procedures.pages.index', $procedure);
    }
}
