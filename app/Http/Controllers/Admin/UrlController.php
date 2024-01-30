<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Inertia\Inertia;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Url/Index', [
            'urls' => Url::with('user')->with('clicks')->latest()->get(),
            'domain' => config('app.url'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Url/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['title'] = Str::ucfirst($request->title);
        $data['original_url'] = $request->original_url;
        $data['shortener_url'] = Str::random(5);
        Url::create($data);
        return to_route('admin.urls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Url $url)
    {
        return Inertia::render('Admin/Url/Edit', [
            'url' => $url
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Url $url)
    {
        return Inertia::render('Admin/Url/Edit', [
            'url' => $url
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Url $url)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'original_url' => 'required|string|max:255',
        ]);
        $validated['shortener_url'] = Str::random(5);
        $url->update($validated);
        return redirect(route('admin.urls.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Url $url)
    {
        $url->delete();
        return redirect(route('admin.urls.index'));
    }

    public function shortenLink($short)
    {
        $find = Url::where('shortener_url', $short)->first();
        return redirect($find->original_url);
    }
}
