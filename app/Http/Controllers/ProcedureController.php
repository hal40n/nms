<?php
namespace App\Http\Controllers;

use App\Models\Procedure;
use App\Models\Category;
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
        return view('procedures.create');
    }

    public function store(Request $request)
    {
        // フォームデータのバリデーション
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // 新しい手順書を作成
        $procedure = new Procedure([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => $this->defaultUserId, // デフォルトのユーザーIDを設定
        ]);

        // 手順書をデータベースに保存
        $procedure->save();

        // 手順書一覧ページにリダイレクトし、成功メッセージを表示
        return redirect()->route('procedures.index')->with('success', 'Procedure created successfully.');
    }

    public function show(Procedure $procedure)
    {
        return view('procedures.show', compact('procedure'));
    }

    public function edit(Procedure $procedure)
    {
        return view('procedures.edit', compact('procedure'));
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
