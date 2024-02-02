<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDomainRequest;
use App\Http\Requests\UpdateDomainRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Domain;
use Inertia\Inertia;


class DomainController extends Controller
{

    /**
     * Display a listing of the resource.
     */

    public function index()
    {

          $domains = Domain::with('user')->latest()->get();

         # dd($domains);

          return Inertia::render('Admin/Domain/Index', [
              'domains' => $domains,
              'domain' => config('app.domain'),
          ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Domain/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDomainRequest $request)
    {
        $validatedData = $request->validate([
            'domain' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $data = [
            'domain' => $validatedData['domain'],
            'status' => $validatedData['status'],
        ];

        Domain::create($data);

        return redirect()->route('admin.domains.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Domain $domain)
    {
        return Inertia::render('Admin/Domain/Edit', [
            'domain' => $domain
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Domain $domain)
    {
        return Inertia::render('Admin/Domain/Edit', [
            'domain' => $domain
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDomainRequest $request, Domain $domain)
    {
        $validated = $request->validate([
            'domain' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);

        $domain->update([
            'domain' => $validated['domain'],
            'status' => $validated['status'],
        ]);

        return redirect(route('admin.domains.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Domain $domain)
    {
        $domain->delete();
        return redirect(route('admin.domains.index'));
    }
}
