<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function index()
    {
        $newsletters = Newsletter::all();
        return view('admin.newsletters.index', compact('newsletters'));
    }

    public function create()
    {
        return view('admin.newsletters.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Newsletter::create($request->all());
        return redirect()->route('admin.newsletters.index');
    }

    public function edit(Newsletter $newsletter)
    {
        return view('admin.newsletters.edit', compact('newsletter'));
    }

    public function update(Request $request, Newsletter $newsletter)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $newsletter->update($request->all());
        return redirect()->route('admin.newsletters.index');
    }

    public function destroy(Newsletter $newsletter)
    {
        $newsletter->delete();
        return response()->json(['message' => 'Newsletter deleted successfully']);
    }

    public function recover($id)
{
    $newsletter = Newsletter::withTrashed()->findOrFail($id);
    $newsletter->restore();

    return redirect()->route('admin.newsletters.index')->with('success', 'Newsletter recovered successfully.');
}


}
