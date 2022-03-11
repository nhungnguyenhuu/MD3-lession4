<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{

    public function index()
    {
        $notes = DB::table("notes")->get();
        return view("note.index", compact('notes'));
    }


    public function create()
    {
        return view("backend.note.create");
    }

    public function store(Request $request)
    {
        $data = $request->only("title", "content");
        DB::table("notes")->insert($data);
        return redirect()->route('backend.note.index');
    }


    public function show($id)
    {
        $note = DB::table("notes")->where("id", $id)->first();
        return view("backend.note.detail", compact('note'));
    }


    public function edit($id)
    {
        $note = DB::table("notes")->where("id", $id)->first();
        return view("backend.note.update", compact('note'));
    }



    public function update(Request $request, $id)
    {
        $data = $request->only("title", "content");
        DB::table("notes")->where("id", $id)->update($data);
        return redirect()->route('backend.note.index');
    }

    public function destroy($id)
    {
        DB::table("notes")->where("id", $id)->delete();
        return redirect()->route('backend.note.index');
    }
}
