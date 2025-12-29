<x-app-layout>
    <title>Arewa Smart - Support Dashboard</title>
    <div class="page-body">
        <div class="container-fluid">
            <!-- Header -->
            <div class="page-title mb-4">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12">
                        <h3 class="fw-bold text-dark mb-1">Support Dashboard</h3>
                        <p class="text-muted small mb-0">Manage your support tickets and get help.</p>
                    </div>
                    <div class="col-sm-6 col-12 text-end mt-3 mt-sm-0">
                        <a href="{{ route('support.create') }}" class="btn btn-primary shadow-sm rounded-pill px-4">
                            <i class="ti ti-plus me-1"></i> Open New Ticket
                        </a>
                    </div>
                </div>
            </div>

            <!-- WhatsApp Banner -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="card bg-success text-white shadow border-0 overflow-hidden" style="border-radius: 15px;">
                        <div class="card-body d-flex align-items-center justify-content-between p-4 bg-gradient-success">
                            <div class="d-flex align-items-center">
                                <span class="bg-white text-success rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                                    <i class="ti ti-brand-whatsapp fs-2"></i>
                                </span>
                                <div>
                                    <h5 class="mb-1 fw-bold">Need Immediate Assistance?</h5>
                                    <p class="mb-0 text-white-50">Our support team is available on WhatsApp for quick resolution.</p>
                                </div>
                            </div>
                            <a href="https://wa.me/+2347037343660" target="_blank" class="btn btn-light text-success fw-bold rounded-pill px-4 shadow-sm">
                                Chat Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tickets Table -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-white border-bottom py-3 d-flex align-items-center">
                            <h5 class="mb-0 fw-bold text-primary"><i class="ti ti-list me-2"></i>Your Support Tickets</h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr class="text-uppercase text-muted small fw-bold" style="letter-spacing: 0.5px;">
                                            <th class="ps-4" style="width: 5%;">S/N</th>
                                            <th style="width: 15%;">Ticket ID</th>
                                            <th style="width: 35%;">Subject</th>
                                            <th style="width: 15%;">Status</th>
                                            <th style="width: 15%;">Last Update</th>
                                            <th class="text-end pe-4" style="width: 15%;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($tickets as $ticket)
                                            <tr>
                                                <td class="ps-4 text-muted fw-bold">
                                                    {{ $tickets->firstItem() + $loop->index }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-light text-dark border fw-bold text-uppercase px-2 py-1">
                                                        {{ $ticket->ticket_reference }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="fw-medium text-dark">{{ Str::limit($ticket->subject, 50) }}</span>
                                                </td>
                                                <td>
                                                    <span class="badge rounded-pill bg-{{ match($ticket->status) {
                                                        'open' => 'success',
                                                        'answered' => 'primary',
                                                        'customer_reply' => 'warning',
                                                        'closed' => 'secondary',
                                                        default => 'info'
                                                    } }} px-3 py-2">
                                                        {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                                                    </span>
                                                </td>
                                                <td class="text-muted small">
                                                    <i class="ti ti-clock me-1"></i>{{ $ticket->updated_at->diffForHumans() }}
                                                </td>
                                                <td class="text-end pe-4">
                                                    <a href="{{ route('support.show', $ticket->ticket_reference) }}" class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                                        View Chat <i class="ti ti-arrow-right ms-1"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="6" class="text-center py-5">
                                                    <div class="empty-state">
                                                        <div class="mb-3">
                                                            <div class="avatar bg-light text-primary rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                                                                <i class="ti ti-ticket fs-1"></i>
                                                            </div>
                                                        </div>
                                                        <h5 class="fw-bold text-dark">No Tickets Found</h5>
                                                        <p class="text-muted mb-3">You haven't created any support tickets yet.</p>
                                                        <a href="{{ route('support.create') }}" class="btn btn-primary rounded-pill px-4">
                                                            Create Your First Ticket
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer bg-white border-top-0 py-3">
                            {{ $tickets->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
