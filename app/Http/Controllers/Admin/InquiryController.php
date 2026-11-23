<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Inquiry::latest();
        if ($request->has('type') && in_array($request->type, ['quote', 'contact'])) {
            $query->where('type', $request->type);
        }
        if ($request->has('status') && in_array($request->status, ['new', 'read', 'replied'])) {
            $query->where('status', $request->status);
        }

        $inquiries = $query->paginate(15);
        return view('admin.inquiries.index', compact('inquiries'));
    }

    public function show(Inquiry $inquiry)
    {
        if ($inquiry->status === 'new') {
            $inquiry->update(['status' => 'read']);
        }
        return view('admin.inquiries.show', compact('inquiry'));
    }

    public function updateStatus(Request $request, Inquiry $inquiry)
    {
        $request->validate(['status' => 'required|in:new,read,replied']);
        $inquiry->update(['status' => $request->status]);
        return back()->with('success', 'Inquiry status updated!');
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();
        return redirect()->route('admin.inquiries.index')->with('success', 'Inquiry deleted successfully!');
    }
}
