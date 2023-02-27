<?php

namespace SamuelKubala\TimeEntryManagement\Http\Controllers;

use Illuminate\Routing\Controller;
use SamuelKubala\TimeEntryManagement\Models\TimeEntry;
use Illuminate\Http\Request;

class TimeEntriesController extends Controller
{
    public function index()
    {
        return TimeEntry::all();
    }

    public function store(Request $request)
    {
        return TimeEntry::create($request->all());
    }

    public function show($id)
    {

        return TimeEntry::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $entry = TimeEntry::findOrFail($id);
        $entry->update($request->all());
        return $entry;
    }

    public function destroy($id)
    {
        return TimeEntry::destroy($id);
    }
}
