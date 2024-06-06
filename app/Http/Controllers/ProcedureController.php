<?php
namespace App\Http\Controllers;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController extends Controller
{
    public function index()
    {
        $procedures = Procedure::orderBy('created_at', 'desc')->paginate(20);
        return view('procedures.index', compact('procedures'));
    }

    public function show(Procedure $procedure)
    {
        $pages = $procedure->pages;
        return view('procedures.show', compact('procedure', 'pages'));
    }

    public function create()
    {
        return view('procedures.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $procedure = Procedure::create($request->all());
        return redirect()->route('procedures.index');
    }

    public function edit(Procedure $procedure)
    {
        return view('procedures.edit', compact('procedure'));
    }

    public function update(Request $request, Procedure $procedure)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $procedure->update($request->all());
        return redirect()->route('procedures.index');
    }

    public function destroy(Procedure $procedure)
    {
        $procedure->delete();
        return redirect()->route('procedures.index');
    }
}
