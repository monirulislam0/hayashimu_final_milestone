@section('title')
    {{ config('app.name') }} | Contact Message Details
@endsection

<x-admin-layout>
    <style>
        .detail-page { max-width: 95%; margin: 0 auto; }
        .detail-top-bar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .detail-page-title { font-size: 18px; font-weight: 500; color: #111; }
        .detail-btn { font-size: 13px; color: #666; text-decoration: none; border: 0.5px solid #d0d0d0; padding: 6px 14px; border-radius: 8px; background: transparent; cursor: pointer; display: inline-block; }
        .detail-btn:hover { background: #f5f5f5; color: #333; text-decoration: none; }
        .detail-grid { display: grid; grid-template-columns: minmax(0, 1fr) 240px; gap: 1.5rem; }
        .detail-card { background: #fff; border: 0.5px solid #e5e5e5; border-radius: 12px; padding: 1.25rem; margin-bottom: 1.25rem; }
        .detail-section-label { font-size: 11px; font-weight: 500; color: #aaa; letter-spacing: 0.8px; text-transform: uppercase; margin-bottom: 1rem; }
        .detail-fields { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
        .detail-field-full { grid-column: 1 / -1; }
        .detail-field-label { font-size: 12px; color: #aaa; margin-bottom: 3px; }
        .detail-field-value { font-size: 14px; color: #111; }
        .detail-message-body { font-size: 14px; color: #111; line-height: 1.7; background: #f9f9f9; border-radius: 8px; padding: 1rem; white-space: pre-wrap; }
        .detail-table { width: 100%; border-collapse: collapse; font-size: 13px; }
        .detail-table th { color: #aaa; font-weight: 500; font-size: 11px; text-transform: uppercase; letter-spacing: 0.6px; padding: 0 0 8px; text-align: left; border-bottom: 0.5px solid #e5e5e5; }
        .detail-table td { padding: 10px 0; border-bottom: 0.5px solid #f0f0f0; color: #111; vertical-align: middle; }
        .detail-table tbody tr:last-child td { border-bottom: none; }
        .detail-view-link { font-size: 12px; color: #185FA5; text-decoration: none; border: 0.5px solid #b5d4f4; padding: 4px 10px; border-radius: 8px; }
        .detail-view-link:hover { background: #e6f1fb; color: #185FA5; text-decoration: none; }
        .detail-meta-row { margin-bottom: 14px; }
        .detail-meta-row:last-child { margin-bottom: 0; }
        .detail-msg-id { font-size: 20px; font-weight: 500; color: #111; }
        .detail-badge { display: inline-block; font-size: 11px; padding: 3px 10px; border-radius: 99px; background: #f0f0f0; color: #666; }
        .detail-status-dot { display: inline-block; width: 7px; height: 7px; border-radius: 50%; background: #3B6D11; margin-right: 6px; vertical-align: middle; }
        .detail-btn-delete { width: 100%; font-size: 13px; padding: 8px 0; border-radius: 8px; border: 0.5px solid #f0a0a0; color: #A32D2D; background: transparent; cursor: pointer; margin-bottom: 8px; }
        .detail-btn-delete:hover { background: #fcebeb; }
        .detail-btn-secondary { width: 100%; font-size: 13px; padding: 8px 0; border-radius: 8px; border: 0.5px solid #d0d0d0; color: #666; background: transparent; cursor: pointer; text-align: center; display: block; text-decoration: none; }
        .detail-btn-secondary:hover { background: #f5f5f5; color: #333; text-decoration: none; }

        @media (max-width: 640px) {
            .detail-grid { grid-template-columns: 1fr; }
            .detail-fields { grid-template-columns: 1fr; }
            .detail-field-full { grid-column: 1; }
        }
    </style>

    <div class="detail-page">
        <div class="detail-top-bar">
            <span class="detail-page-title">Message details</span>
            <a href="{{ route('admin.contact-message') }}" class="detail-btn">← Back to list</a>
        </div>

        @include('admin.includes.flash')

        <div class="detail-grid">
            {{-- Left Column --}}
            <div>
                {{-- Contact Information --}}
                <div class="detail-card">
                    <div class="detail-section-label">Contact information</div>
                    <div class="detail-fields">
                        <div>
                            <div class="detail-field-label">Name</div>
                            <div class="detail-field-value">{{ $message->name }}</div>
                        </div>
                        <div>
                            <div class="detail-field-label">Email</div>
                            <div class="detail-field-value">{{ $message->email }}</div>
                        </div>
                        <div>
                            <div class="detail-field-label">Mobile</div>
                            <div class="detail-field-value">{{ $message->mobile }}</div>
                        </div>
                        <div>
                            <div class="detail-field-label">Company</div>
                            <div class="detail-field-value">{{ $message->company_name ?? 'Not provided' }}</div>
                        </div>
                        <div class="detail-field-full">
                            <div class="detail-field-label">Country</div>
                            <div class="detail-field-value">{{ $message->country_name ?? 'Not provided' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Message --}}
                <div class="detail-card">
                    <div class="detail-section-label">Message</div>
                    <div class="detail-message-body">{{ $message->message }}</div>
                </div>

                {{-- Products --}}
                @if($message->products->count() > 0)
                <div class="detail-card">
                    <div class="detail-section-label">Interested products</div>
                    <table class="detail-table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Product</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $sl = 0 @endphp
                            @foreach($message->products as $product)
                            <tr>
                                <td style="color: #aaa; width: 32px;">{{ ++$sl }}</td>
                                <td>{{ $product->name }}</td>
                                <td style="text-align: right;">
                                    <a href="{{ route('frontend.product.detail', $product->slug) }}" target="_blank" class="detail-view-link">View</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>

            {{-- Right Sidebar --}}
            <div>
                {{-- Details --}}
                <div class="detail-card">
                    <div class="detail-section-label">Details</div>
                    <div class="detail-meta-row">
                        <div class="detail-field-label">Message ID</div>
                        <div class="detail-msg-id">#{{ $message->id }}</div>
                    </div>
                    <div class="detail-meta-row">
                        <div class="detail-field-label">Received</div>
                        <div class="detail-field-value" style="font-size: 13px;">
                            {{ $message->created_at->format('M j, Y — g:i A') }}
                        </div>
                    </div>
                    @if($message->products->count() > 0)
                    <div class="detail-meta-row">
                        <div class="detail-field-label">Products</div>
                        <div style="margin-top: 4px;">
                            <span class="detail-badge">{{ $message->products->count() }} item(s)</span>
                        </div>
                    </div>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="detail-card">
                    <div class="detail-section-label">Actions</div>
                    <form method="POST" action="{{ route('admin.contact-message.delete', $message->id) }}" onsubmit="return confirm('Delete this message?')">
                        @csrf
                        <button type="submit" class="detail-btn-delete">Delete message</button>
                    </form>
                    <a href="{{ route('admin.contact-message') }}" class="detail-btn-secondary">All messages</a>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>