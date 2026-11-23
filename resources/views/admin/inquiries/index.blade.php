@extends('admin.layouts.app')

@section('page-title', 'Customer Inquiries & Quotes')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h4 class="fw-bold mb-1">Inquiries & Quote Requests</h4>
        <p class="text-muted mb-0">Review export commodity inquiries and quotation leads from buyers worldwide.</p>
    </div>
    <div class="btn-group">
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-sm {{ !request('type') && !request('status') ? 'btn-dija' : 'btn-outline-secondary' }}">All</a>
        <a href="{{ route('admin.inquiries.index', ['type' => 'quote']) }}" class="btn btn-sm {{ request('type') === 'quote' ? 'btn-dija' : 'btn-outline-secondary' }}">Quotes Only</a>
        <a href="{{ route('admin.inquiries.index', ['type' => 'contact']) }}" class="btn btn-sm {{ request('type') === 'contact' ? 'btn-dija' : 'btn-outline-secondary' }}">Messages Only</a>
        <a href="{{ route('admin.inquiries.index', ['status' => 'new']) }}" class="btn btn-sm {{ request('status') === 'new' ? 'btn-danger' : 'btn-outline-danger' }}">Unread / New</a>
    </div>
</div>

<div class="card-custom">
    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Customer Name</th>
                    <th>Contact Info</th>
                    <th>Commodity / Service</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inquiries as $inq)
                    <tr>
                        <td>
                            @if($inq->type === 'quote')
                                <span class="badge bg-primary">Quote</span>
                            @else
                                <span class="badge bg-secondary">Message</span>
                            @endif
                        </td>
                        <td>
                            <div class="fw-bold">{{ $inq->name }}</div>
                            @if($inq->company)
                                <small class="text-muted"><i class="fa fa-building me-1"></i>{{ $inq->company }}</small>
                            @endif
                        </td>
                        <td>
                            <div><i class="fa fa-envelope text-muted me-1"></i><a href="mailto:{{ $inq->email }}">{{ $inq->email }}</a></div>
                            @if($inq->phone)
                                <small class="text-muted"><i class="fa fa-phone me-1"></i>{{ $inq->phone }}</small>
                            @endif
                        </td>
                        <td>
                            <div class="fw-semibold">{{ $inq->service_interest ?: 'General Inquiries' }}</div>
                            @if($inq->destination_country)
                                <small class="text-muted"><i class="fa fa-globe me-1"></i>To: {{ $inq->destination_country }}</small>
                            @endif
                        </td>
                        <td>
                            <small class="text-muted">{{ $inq->created_at->format('M d, Y H:i') }}</small>
                        </td>
                        <td>
                            @if($inq->status === 'new')
                                <span class="badge bg-danger">New</span>
                            @elseif($inq->status === 'read')
                                <span class="badge bg-warning text-dark">Read</span>
                            @else
                                <span class="badge bg-success">Replied</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('admin.inquiries.show', $inq->id) }}" class="btn btn-sm btn-outline-primary me-1">
                                <i class="fa fa-eye"></i> View
                            </a>
                            <form action="{{ route('admin.inquiries.destroy', $inq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this inquiry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-muted">No inquiries found matching criteria.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($inquiries->hasPages())
        <div class="p-3 border-top">
            {{ $inquiries->links() }}
        </div>
    @endif
</div>

@endsection
