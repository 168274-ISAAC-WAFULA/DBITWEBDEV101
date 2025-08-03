<?php

namespace App\Http\Controllers;

use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingsController extends Controller
{
    public function index()
    {
        $settings = SystemSetting::all();
        return view('settings.index', compact('settings'));
    }

    public function edit(SystemSetting $setting)
    {
        return view('settings.edit', compact('setting'));
    }

    public function update(Request $request, SystemSetting $setting)
    {
        $validated = $request->validate([
            'value' => 'required',
            'description' => 'nullable|string'
        ]);

        $setting->update($validated);
        return redirect()->route('settings.index')->with('success', 'Setting updated successfully');
    }
}
