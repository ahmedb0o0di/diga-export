@extends('admin.layouts.app')

@section('page-title', 'Inquiry Details')

@section('content')

<div class="card-custom p-4 mb-4">
    <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
        <div>
            <h5 class="fw-bold mb-1">Inquiry #{{ $inquiry->id }} - {{ $inquiry->name }}</h5>
            <span class="badge {{ $inquiry->type === 'quote' ? 'bg-primary' : 'bg-secondary' }}">
                {{ strtoupper($inquiry->type) }}
            </span>
            <span class="badge ms-2 {{ $inquiry->status === 'new' ? 'bg-danger' : ($inquiry->status === 'read' ? 'bg-warning text-dark' : 'bg-success') }}">
                Status: {{ ucfirst($inquiry->status) }}
            </span>
        </div>
        <div>
            <a href="{{ route('admin.inquiries.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Back to Inquiries</a>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <h6 class="fw-bold border-bottom pb-2">Sender Information</h6>
            <table class="table table-sm table-borderless">
                <tr>
                    <th style="width: 140px;" class="text-muted">Full Name:</th>
                    <td class="fw-semibold">{{ $inquiry->name }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Email:</th>
                    <td><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></td>
                </tr>
                <tr>
                    <th class="text-muted">Phone:</th>
                    <td>{{ $inquiry->phone ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Company:</th>
                    <td>{{ $inquiry->company ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Destination:</th>
                    <td>{{ $inquiry->destination_country ?: 'N/A' }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Date Received:</th>
                    <td>{{ $inquiry->created_at->format('F d, Y \a\t H:i A') }}</td>
                </tr>
            </table>
        </div>

        <div class="col-md-6">
            <h6 class="fw-bold border-bottom pb-2">Inquiry Specifications</h6>
            <table class="table table-sm table-borderless">
                <tr>
                    <th style="width: 140px;" class="text-muted">Subject / Focus:</th>
                    <td class="fw-semibold">{{ $inquiry->subject ?: 'Export Inquiry' }}</td>
                </tr>
                <tr>
                    <th class="text-muted">Service / Product:</th>
                    <td><span class="badge bg-light text-dark border">{{ $inquiry->service_interest ?: 'General Inquiries' }}</span></td>
                </tr>
                <tr>
                    <th class="text-muted">Estimated Volume:</th>
                    <td>{{ $inquiry->volume ?: 'Not specified' }}</td>
                </tr>
            </table>

            <div class="card bg-light border-0 p-3 mt-3">
                <label class="form-label fw-bold mb-2">Update Processing Status</label>
                <form action="{{ route('admin.inquiries.status', $inquiry->id) }}" method="POST" class="d-flex gap-2">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="form-select form-select-sm">
                        <option value="new" {{ $inquiry->status === 'new' ? 'selected' : '' }}>New</option>
                        <option value="read" {{ $inquiry->status === 'read' ? 'selected' : '' }}>Read / Under Review</option>
                        <option value="replied" {{ $inquiry->status === 'replied' ? 'selected' : '' }}>Replied / Quotation Sent</option>
                    </select>
                    <button type="submit" class="btn btn-sm btn-dija text-nowrap">Update</button>
                </form>
            </div>
        </div>

        <div class="col-12 mt-4">
            <h6 class="fw-bold border-bottom pb-2">Message & Requirements</h6>
            <div class="p-3 bg-light rounded border">
                <p class="mb-0" style="white-space: pre-wrap; font-size: 15px; line-height: 1.6;">{{ $inquiry->message }}</p>
            </div>
        </div>

        <div class="col-12 text-end pt-3 border-top">
            <a href="mailto:{{ $inquiry->email }}?subject=Re:%20DIJA%20Group%20Export%20Inquiry%20-%20{{ urlencode($inquiry->subject ?: 'Quote Request') }}" class="btn btn-dija me-2">
                <i class="fa fa-reply me-1"></i> Reply via Email
            </a>
            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this inquiry permanently?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="fa fa-trash me-1"></i> Delete Inquiry
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
