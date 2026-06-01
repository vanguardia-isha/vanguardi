@extends('layouts.main')

@section('title', 'My Events - Event List')

@section('content')


<div style="min-height: 100vh; background: #f0f4f8; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex;">

    <!-- SIDEBAR -->
    <aside style="width: 80px; background: #ffffff; display: flex; flex-direction: column; align-items: center; padding: 20px 0; box-shadow: 2px 0 10px rgba(0,0,0,0.08); position: fixed; height: 100vh; z-index: 100;">

        <div style="display: flex; flex-direction: column; gap: 8px; flex: 1; width: 100%; align-items: center; margin-top: 10px;">

            <!-- Dashboard -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">

                <a href="{{ route('dashboard') }}"
                   style="
                        width: 50px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 12px;
                        text-decoration: none;
                        font-size: 22px;
                        color: {{ request()->routeIs('dashboard') ? '#4c3b8c' : '#94a3b8' }};
                        background: {{ request()->routeIs('dashboard') ? '#f1f5f9' : 'transparent' }};
                   ">

                    <i class="bi bi-grid-1x2-fill"></i>

                </a>

                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">
                    Dashboard
                </span>

            </div>

            <!-- Events -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">

                <a href="{{ route('products') }}"
                   style="
                        width: 50px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 12px;
                        text-decoration: none;
                        font-size: 22px;
                        color: {{ request()->routeIs('products') ? '#4c3b8c' : '#94a3b8' }};
                        background: {{ request()->routeIs('products') ? '#f1f5f9' : 'transparent' }};
                   ">

                    <i class="bi bi-calendar-event"></i>

                </a>

                <span style="font-size: 10px; color: {{ request()->routeIs('products') ? '#4c3b8c' : '#64748b' }}; margin-top: 2px;">
                    Events
                </span>

            </div>

            <!-- Users -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">

                <a href="{{ route('users') }}"
                   style="
                        width: 50px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 12px;
                        text-decoration: none;
                        font-size: 22px;
                        color: {{ request()->routeIs('users') ? '#4c3b8c' : '#94a3b8' }};
                        background: {{ request()->routeIs('users') ? '#f1f5f9' : 'transparent' }};
                   ">

                    <i class="bi bi-people"></i>

                </a>

                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">
                    Users
                </span>

            </div>

            <!-- FAQ -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">

                <a href="#"
                   style="
                        width: 50px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 12px;
                        color: #94a3b8;
                        text-decoration: none;
                        font-size: 22px;
                   ">

                    <i class="bi bi-question-circle"></i>

                </a>

                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">
                    FAQ
                </span>

            </div>

            <!-- Settings -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">

                <a href="{{ route('profile') }}"
                   style="
                        width: 50px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 12px;
                        text-decoration: none;
                        font-size: 22px;
                        color: {{ request()->routeIs('profile') ? '#4c3b8c' : '#94a3b8' }};
                        background: {{ request()->routeIs('profile') ? '#f1f5f9' : 'transparent' }};
                   ">

                    <i class="bi bi-gear"></i>

                </a>

                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">
                    Settings
                </span>

            </div>

            <!-- Logout -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">

                <a href="{{ route('logout') }}"
                   onclick="return confirm('Logout now?')"
                   style="
                        width: 50px;
                        height: 50px;
                        display: flex;
                        align-items: center;
                        justify-content: center;
                        border-radius: 12px;
                        color: #ef4444;
                        text-decoration: none;
                        font-size: 22px;
                   ">

                    <i class="bi bi-box-arrow-right"></i>

                </a>

                <span style="font-size: 10px; color: #ef4444;">
                    Logout
                </span>

            </div>

        </div>

    </aside>

    <!-- Main Content -->
    <div style="flex: 1; margin-left: 90px; background: #f0f4f8; min-height: 100vh;">

        <!-- Top Header -->
        <header style="background: #ffffff; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 100;">
            <h1 style="font-size: 24px; font-weight: 600; color: #334155; margin: 0;">Welcome {{ $user->name ?? 'Nirmal' }}!</h1>

            <div style="display: flex; align-items: center; gap: 20px;">
                <div style="position: relative;">
                    <input type="text" placeholder="Search events.
.." style="padding: 10px 40px 10px 15px; border: 1px solid #e2e8f0; border-radius: 25px; width: 280px; font-size: 14px; outline: none; background: #f8fafc; color: #334155;">
                    <i class="bi bi-search" style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
                </div>
                <div style="display: flex; gap: 15px; align-items: center;">
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #64748b; cursor: pointer;">
                        <i class="bi bi-moon"></i>
                    </div>
                    <div style="width: 40px; height: 40px; border-radius: 50%; background: #f1f5f9; display: flex; align-items: center; justify-content: center; color: #64748b; cursor: pointer;">
                        <i class="bi bi-bell"></i>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content -->
        <main style="padding: 30px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">
                <h2 style="font-size: 20px; font-weight: 600; color: #334155; margin: 0;">My Events</h2>
                <button style="padding: 10px 20px; background: #22c55e; color: white; border: none; border-radius: 8px; font-size: 14px; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 500;" data-bs-toggle="modal" data-bs-target="#addEventModal">
                    <i class="bi bi-plus-circle"></i> Add Event
                </button>
            </div>

            <!-- Static Event Cards -->
            <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(280px, 1fr)); gap: 20px; margin-bottom: 30px;">
                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div style="height: 160px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
                        <i class="bi bi-calendar-event"></i>
                    </div>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 8px 0; font-size: 16px; color: #334155;">Tech Conference 2024</h4>
                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #64748b; line-height: 1.5;">Annual technology conference featuring latest innovations and networking opportunities.</p>
                        <p style="margin: 0 0 12px 0; font-size: 12px; color: #94a3b8;"><i class="bi bi-geo-alt-fill" style="color:#4c3b8c;"></i> San Francisco, CA</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #3b82f6; font-weight: 600;">Dec 15, 2024</span>
                            <span style="padding: 4px 10px; background: #dcfce7; color: #166534; border-radius: 12px; font-size: 11px; font-weight: 500;">Upcoming</span>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div style="height: 160px; background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
                        <i class="bi bi-music-note-beamed"></i>
                    </div>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 8px 0; font-size: 16px; color: #334155;">Summer Music Festival</h4>
                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #64748b; line-height: 1.5;">Outdoor music festival with top artists and food vendors.</p>
                        <p style="margin: 0 0 12px 0; font-size: 12px; color: #94a3b8;"><i class="bi bi-geo-alt-fill" style="color:#f5576c;"></i> Central Park, NY</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #3b82f6; font-weight: 600;">Jul 20, 2024</span>
                            <span style="padding: 4px 10px; background: #dcfce7; color: #166534; border-radius: 12px; font-size: 11px; font-weight: 500;">Upcoming</span>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div style="height: 160px; background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
                        <i class="bi bi-trophy"></i>
                    </div>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 8px 0; font-size: 16px; color: #334155;">Coding Hackathon</h4>
                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #64748b; line-height: 1.5;">48-hour coding competition with prizes and mentorship.</p>
                        <p style="margin: 0 0 12px 0; font-size: 12px; color: #94a3b8;"><i class="bi bi-geo-alt-fill" style="color:#4facfe;"></i> Austin, TX</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #3b82f6; font-weight: 600;">Aug 10, 2024</span>
                            <span style="padding: 4px 10px; background: #fef3c7; color: #92400e; border-radius: 12px; font-size: 11px; font-weight: 500;">Registration Open</span>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div style="height: 160px; background: linear-gradient(135deg, #fa709a 0%, #fee140 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
                        <i class="bi bi-palette"></i>
                    </div>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 8px 0; font-size: 16px; color: #334155;">Art Exhibition</h4>
                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #64748b; line-height: 1.5;">Contemporary art showcase from local and international artists.</p>
                        <p style="margin: 0 0 12px 0; font-size: 12px; color: #94a3b8;"><i class="bi bi-geo-alt-fill" style="color:#fa709a;"></i> Chicago, IL</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #3b82f6; font-weight: 600;">Sep 5, 2024</span>
                            <span style="padding: 4px 10px; background: #dcfce7; color: #166534; border-radius: 12px; font-size: 11px; font-weight: 500;">Upcoming</span>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div style="height: 160px; background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 8px 0; font-size: 16px; color: #334155;">Health & Wellness Summit</h4>
                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #64748b; line-height: 1.5;">Focus on mental health, fitness, and holistic wellness practices.</p>
                        <p style="margin: 0 0 12px 0; font-size: 12px; color: #94a3b8;"><i class="bi bi-geo-alt-fill" style="color:#a8edea;"></i> Miami, FL</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #3b82f6; font-weight: 600;">Oct 12, 2024</span>
                            <span style="padding: 4px 10px; background: #dcfce7; color: #166534; border-radius: 12px; font-size: 11px; font-weight: 500;">Upcoming</span>
                        </div>
                    </div>
                </div>

                <div style="background: white; border-radius: 16px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
                    <div style="height: 160px; background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); display: flex; align-items: center; justify-content: center; color: white; font-size: 48px;">
                        <i class="bi bi-shop"></i>
                    </div>
                    <div style="padding: 20px;">
                        <h4 style="margin: 0 0 8px 0; font-size: 16px; color: #334155;">Startup Pitch Night</h4>
                        <p style="margin: 0 0 6px 0; font-size: 13px; color: #64748b; line-height: 1.5;">Entrepreneurs pitch ideas to investors and industry experts.</p>
                        <p style="margin: 0 0 12px 0; font-size: 12px; color: #94a3b8;"><i class="bi bi-geo-alt-fill" style="color:#fcb69f;"></i> Seattle, WA</p>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span style="font-size: 12px; color: #3b82f6; font-weight: 600;">Nov 8, 2024</span>
                            <span style="padding: 4px 10px; background: #fef3c7; color: #92400e; border-radius: 12px; font-size: 11px; font-weight: 500;">Registration Open</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Events Table -->
            <div style="background: white; border-radius: 16px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden;">
                <div style="padding: 20px 20px 0; display: flex; justify-content: space-between; align-items: center; margin-bottom: 16px;">
                    <h3 style="font-size: 16px; font-weight: 600; color: #334155; margin: 0;">All Events</h3>
                </div>
                <div style="padding: 0 20px 20px; overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; font-size: 14px;">
                        <thead>
                            <tr style="background: #f8fafc;">
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">ID</th>
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">Event Name</th>
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">Description</th>
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">Place</th>
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">Date</th>
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">Status</th>
                                <th style="padding: 12px; text-align: left; color: #64748b; font-weight: 600; font-size: 12px; text-transform: uppercase; letter-spacing: 0.5px; border-bottom: 1px solid #e2e8f0;">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr style="border-top: 1px solid #f1f5f9;">
                                <td style="padding: 14px 12px; color: #334155;">{{ $product->id }}</td>
                                <td style="padding: 14px 12px; color: #334155; font-weight: 500;">{{ $product->product_name }}</td>
                                <td style="padding: 14px 12px; color: #64748b; max-width: 200px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $product->description }}</td>
                                <td style="padding: 14px 12px; color: #64748b;">
                                    <span style="display: flex; align-items: center; gap: 4px;">
                                        <i class="bi bi-geo-alt-fill" style="color: #4c3b8c; font-size: 13px;"></i>
                                        {{ $product->place ?? '—' }}
                                    </span>
                                </td>
                                <td style="padding: 14px 12px; color: #334155;">
                                    <span style="display: flex; align-items: center; gap: 4px;">
                                        <i class="bi bi-calendar3" style="color: #3b82f6; font-size: 13px;"></i>
                                        {{ $product->event_date ? \Carbon\Carbon::parse($product->event_date)->format('M d, Y') : '—' }}
                                    </span>
                                </td>
                                <td style="padding: 14px 12px;">
                                    @php
                                        $status = $product->status ?? 'Upcoming';
                                        $statusStyle = match($status) {
                                            'Upcoming'          => 'background:#dcfce7; color:#166534;',
                                            'Registration Open' => 'background:#fef3c7; color:#92400e;',
                                            'Ongoing'           => 'background:#dbeafe; color:#1e40af;',
                                            'Completed'         => 'background:#f1f5f9; color:#475569;',
                                            'Cancelled'         => 'background:#fee2e2; color:#991b1b;',
                                            default             => 'background:#dcfce7; color:#166534;',
                                        };
                                    @endphp
                                    <span style="padding: 4px 10px; border-radius: 12px; font-size: 11px; font-weight: 500; {{ $statusStyle }}">
                                        {{ $status }}
                                    </span>
                                </td>
                                <td style="padding: 14px 12px;">
                                    <button style="padding: 6px 12px; background: #3b82f6; color: white; border: none; border-radius: 6px; font-size: 12px; cursor: pointer; margin-right: 8px;" data-bs-toggle="modal" data-bs-target="#editEvent{{ $product->id }}">
                                        <i class="bi bi-pencil-fill"></i> Edit
                                    </button>
                                    <form action="/products/delete/{{ $product->id }}" method="POST" style="display: inline;">
                                        @csrf
                                        <button type="submit" style="padding: 6px 12px; background: #ef4444; color: white; border: none; border-radius: 6px; font-size: 12px; cursor: pointer;" onclick="return confirm('Delete this event?')">
                                            <i class="bi bi-trash-fill"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Edit Event Modal -->
                            <div class="modal fade" id="editEvent{{ $product->id }}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header" style="background: #4c3b8c; color: white; border-radius: 8px 8px 0 0;">
                                            <h5 class="modal-title" style="color: white;"><i class="bi bi-pencil-fill me-2"></i>Edit Event</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <form action="/products/update/{{ $product->id }}" method="POST">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Event Name</label>
                                                    <input type="text" name="product_name" class="form-control" value="{{ $product->product_name }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Description</label>
                                                    <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold"><i class="bi bi-geo-alt-fill text-primary me-1"></i>Place</label>
                                                    <input type="text" name="place" class="form-control" value="{{ $product->place }}" placeholder="e.g. San Francisco, CA">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold"><i class="bi bi-calendar3 text-primary me-1"></i>Event Date</label>
                                                    <input type="date" name="event_date" class="form-control" value="{{ $product->event_date ? \Carbon\Carbon::parse($product->event_date)->format('Y-m-d') : '' }}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Status</label>
                                                    <select name="status" class="form-select">
                                                        <option value="Upcoming"          {{ ($product->status ?? '') == 'Upcoming'          ? 'selected' : '' }}>Upcoming</option>
                                                        <option value="Registration Open" {{ ($product->status ?? '') == 'Registration Open' ? 'selected' : '' }}>Registration Open</option>
                                                        <option value="Ongoing"           {{ ($product->status ?? '') == 'Ongoing'           ? 'selected' : '' }}>Ongoing</option>
                                                        <option value="Completed"         {{ ($product->status ?? '') == 'Completed'         ? 'selected' : '' }}>Completed</option>
                                                        <option value="Cancelled"         {{ ($product->status ?? '') == 'Cancelled'         ? 'selected' : '' }}>Cancelled</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" style="background: #4c3b8c; border-color: #4c3b8c;">Update Event</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Add Event Modal -->
<div class="modal fade" id="addEventModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #4c3b8c; color: white; border-radius: 8px 8px 0 0;">
                <h5 class="modal-title" style="color: white;"><i class="bi bi-plus-circle-fill me-2"></i>Add New Event</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="/products" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Event Name</label>
                        <input type="text" name="product_name" class="form-control" placeholder="e.g. Tech Conference 2025" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Brief description of the event..."></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="bi bi-geo-alt-fill text-primary me-1"></i>Place</label>
                        <input type="text" name="place" class="form-control" placeholder="e.g. San Francisco, CA">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold"><i class="bi bi-calendar3 text-primary me-1"></i>Event Date</label>
                        <input type="date" name="event_date" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Status</label>
                        <select name="status" class="form-select">
                            <option value="Upcoming">Upcoming</option>
                            <option value="Registration Open">Registration Open</option>
                            <option value="Ongoing">Ongoing</option>
                            <option value="Completed">Completed</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-plus-circle me-1"></i>Save Event
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection