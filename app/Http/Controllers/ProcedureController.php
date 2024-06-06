<?php
namespace App\Http\Controllers;

use App\Models\Procedure;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProcedureController extends Controller
{
    protected $defaultUserId;

    public function __construct()
    {
        $this->defaultUserId = 1;
    }

    public function index()
    {
        $procedures = Procedure::orderBy('created_at', 'desc')->paginate(30);
        return view('procedures.index', compact('procedures'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('procedures.create', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $procedure = new Procedure([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category_id' => $request->input('category_id'),
            'user_id' => $this->defaultUserId,
        ]);

        $procedure->save();

        if($request->has('tags')) {
            $procedure->tags()->attach($request->input('tags'));
        }

        return redirect()->route('procedures.index')->with('success', 'Procedure created successfully.');
    }

    public function show(Procedure $procedure)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('procedures.show', compact('procedure', 'categories', 'tags'));
    }

    public function edit(Procedure $procedure)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('procedures.edit', compact('procedure', 'categories', 'tags'));
    }

    public function update(Request $request, Procedure $procedure)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
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
