<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    // Show a specific section
    public function show($slug)
    {
        $content = Content::where('slug', $slug)->firstOrFail();
        return view('content.show', compact('content'));
    }

    public function showall()
    {
        $content = Content::get();
        return view('content.showall', compact('content'));
    }

    // Display form to edit content
    public function edit($id)
    {
        $content = Content::findOrFail($id);
        return view('content.edit', compact('content'));
    }

    // Update content
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        $content = Content::findOrFail($id);
        $content->update($request->all());

        return redirect()->route('content.show', $content->slug)
            ->with('success', 'Content updated successfully.');
    }

    // Index for FAQs
    public function indexFAQ()
    {
        $faqs = Content::where('slug', 'faq')->get();
        return view('content.faq', compact('faqs'));
    }
}
