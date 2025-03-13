<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Http\Requests\Unit\StoreUnitRequest;
use App\Http\Requests\Unit\UpdateUnitRequest;
use Illuminate\Support\Str;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Ensure authentication
    }

    public function index()
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        // Fetch units for the logged-in user's account
        $units = Unit::where('account_id', $accountId)
            ->where('user_id', auth()->id())
            ->select(['id', 'name', 'slug', 'short_code'])
            ->get();

        return view('units.index', [
            'units' => $units,
        ]);
    }

    public function create()
    {
        return view('units.create');
    }

    public function show(Unit $unit)
    {
        // Ensure the unit belongs to the logged-in user's account
        $this->authorize('view', $unit);

        $unit->loadMissing('products');
        return view('units.show', ['unit' => $unit]);
    }

    public function store(StoreUnitRequest $request)
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        Unit::create([
            'account_id' => $accountId, // Set the account_id
            'user_id' => auth()->id(),
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'short_code' => $request->short_code
        ]);

        return redirect()->route('units.index')->with('success', 'The unit has been added successfully!');
    }

    public function edit(Unit $unit)
    {
        // Ensure the unit belongs to the logged-in user's account
        $this->authorize('update', $unit);

        return view('units.edit', ['unit' => $unit]);
    }

    public function update(UpdateUnitRequest $request, $slug)
    {
        // Get the logged-in user's account_id
        $accountId = auth()->user()->account_id;

        // Find the unit by slug and account_id
        $unit = Unit::where(['account_id' => $accountId, 'slug' => $slug, 'user_id' => auth()->id()])->firstOrFail();

        // Update the unit
        $unit->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'short_code' => $request->short_code
        ]);

        return redirect()->route('units.index')->with('success', 'The unit has been updated successfully!');
    }

    public function destroy(Unit $unit)
    {
        // Ensure the unit belongs to the logged-in user's account
        $this->authorize('delete', $unit);

        $unit->delete();
        return redirect()->route('units.index')->with('success', 'The unit has been deleted successfully!');
    }
}
