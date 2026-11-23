<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all()->pluck('value', 'key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $data = $request->except('_token');

        // Text & multi-lingual fields
        $multilingualKeys = ['site_name', 'site_slogan', 'site_description', 'contact_address', 'working_hours'];

        foreach ($multilingualKeys as $key) {
            if ($request->has($key)) {
                Setting::set($key, $request->input($key));
                unset($data[$key]);
            }
        }

        // Handle File Uploads (logos)
        if ($request->hasFile('header_logo')) {
            $file = $request->file('header_logo');
            $filename = 'logo_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/logo'), $filename);
            Setting::set('header_logo', 'assets/images/logo/' . $filename);
            unset($data['header_logo']);
        }

        if ($request->hasFile('footer_logo')) {
            $file = $request->file('footer_logo');
            $filename = 'logo_white_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images/logo'), $filename);
            Setting::set('footer_logo', 'assets/images/logo/' . $filename);
            unset($data['footer_logo']);
        }

        // Save remaining single fields
        foreach ($data as $key => $val) {
            Setting::set($key, $val);
        }

        return back()->with('success', 'Site settings updated successfully!');
    }
}
