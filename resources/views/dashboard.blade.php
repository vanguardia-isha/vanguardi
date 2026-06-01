@extends('layouts.main')

@section('title', 'Dashboard - Events Dashboard')

@section('content')

@php
$userId = session('user_id');

$userCount = \App\Models\User::count();
$productCount = \App\Models\Product::count();

$myProducts = \App\Models\Product::where('user_id', $userId)->count();
$otherProducts = \App\Models\Product::where('user_id', '!=', $userId)->count();

$user = \App\Models\User::find(session('user_id'));
@endphp

<div style="min-height: 100vh; background: #f0f4f8; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; display: flex;">

    <!-- SIDEBAR -->
    <aside style="width: 80px; background: #ffffff; display: flex; flex-direction: column; align-items: center; padding: 20px 0; box-shadow: 2px 0 10px rgba(0,0,0,0.08); position: fixed; height: 100vh; z-index: 100;">

        <!-- NAV ITEMS -->
        <div style="display: flex; flex-direction: column; gap: 8px; flex: 1; width: 100%; align-items: center; margin-top: 10px;">

            <!-- Dashboard -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">
                <a href="{{ route('dashboard') }}"
                   style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; color: #4c3b8c; text-decoration: none; font-size: 22px; background: #f1f5f9;">
                    <i class="bi bi-grid-1x2-fill"></i>
                </a>
                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">Dashboard</span>
            </div>

            <!-- Events -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">
                <a href="{{ route('products') }}"
                   style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; color: #94a3b8; text-decoration: none; font-size: 22px;">
                    <i class="bi bi-calendar-event"></i>
                </a>
                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">Events</span>
            </div>

            <!-- Users -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">
                <a href="{{ route('users') }}"
                   style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; color: #94a3b8; text-decoration: none; font-size: 22px;">
                    <i class="bi bi-people"></i>
                </a>
                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">Users</span>
            </div>

            <!-- FAQ -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">
                <a href="#"
                   style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; color: #94a3b8; text-decoration: none; font-size: 22px;">
                    <i class="bi bi-question-circle"></i>
                </a>
                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">FAQ</span>
            </div>

            <!-- Settings -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-bottom: 8px;">
                <a href="{{ route('profile') }}"
                   style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; color: #94a3b8; text-decoration: none; font-size: 22px;">
                    <i class="bi bi-gear"></i>
                </a>
                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">Settings</span>
            </div>

            <!-- Logout -->
            <div style="display: flex; flex-direction: column; align-items: center; margin-top: 10px;">
                <a href="{{ route('logout') }}"
                   onclick="return confirm('Logout now?')"
                   style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center; border-radius: 12px; color: #ef4444; text-decoration: none; font-size: 22px;">
                    <i class="bi bi-box-arrow-right"></i>
                </a>
                <span style="font-size: 10px; color: #ef4444;">Logout</span>
            </div>

        </div>

    </aside>

    <!-- MAIN CONTENT -->
    <div style="flex:1; margin-left:80px; padding:30px;">

        <!-- CARDS -->
        <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:20px;margin-bottom:30px;">

            <div style="background:linear-gradient(135deg,#3b82f6,#06b6d4);color:#fff;padding:20px;border-radius:16px;">
                <p>Total Events</p>
                <h2>{{ $productCount }}</h2>
            </div>

            <div style="background:linear-gradient(135deg,#8b5cf6,#ec4899);color:#fff;padding:20px;border-radius:16px;">
                <p>Event Target Progress</p>
                <h2>{{ $productCount }} / 100</h2>
            </div>

            <div style="background:linear-gradient(135deg,#10b981,#3b82f6);color:#fff;padding:20px;border-radius:16px;">
                <p>Total Users</p>
                <h2>{{ $userCount }}</h2>
            </div>

            <div style="background:linear-gradient(135deg,#f59e0b,#ef4444);color:#fff;padding:20px;border-radius:16px;">
                <p>System Status</p>
                <h2>Online</h2>
            </div>

        </div>

        <!-- CHARTS -->
        <div style="display:grid;grid-template-columns:2fr 1fr;gap:20px;margin-bottom:30px;">

            <!-- MONTHLY EVENTS -->
            <div style="background:white;border-radius:16px;padding:24px;">
                <h3>Events Per Month (Annual Overview)</h3>

                <div style="display:flex;align-items:flex-end;justify-content:space-between;height:260px;gap:8px;margin-top:20px;">

                    @php
                    $months = [
                        'January','February','March','April','May','June',
                        'July','August','September','October','November','December'
                    ];

                    $heights = [30,45,60,80,50,70,40,65,55,75,35,90];
                    @endphp

                    @foreach($months as $i => $month)
                        <div style="flex:1;text-align:center;">
                            <div style="height:{{ $heights[$i] }}px;background:#3b82f6;border-radius:4px;"></div>
                            <span style="font-size:11px;">{{ $month }}</span>
                        </div>
                    @endforeach

                </div>
            </div>

            <!-- OVERVIEW -->
            <div style="background:white;border-radius:16px;padding:24px;">
                <h3>Event Overview</h3>

                <p>Total Events: {{ $productCount }}</p>
                <p>Total Users: {{ $userCount }}</p>
                <p>My Events: {{ $myProducts }}</p>
                <p>Other Events: {{ $otherProducts }}</p>
                <p>Status: Active</p>
            </div>

        </div>

        <!-- BOTTOM SECTION -->
        <div style="display:grid;grid-template-columns:1fr 2fr;gap:20px;">

            <div style="background:white;border-radius:16px;padding:24px;">
                <h3>Event Managers</h3>

                <p>
                    Administrators manage event creation, approvals,
                    scheduling, and monitoring of the system.
                </p>
            </div>

            <div style="background:white;border-radius:16px;padding:24px;">
                <h3>Event Reports</h3>

                <p>
                    Monthly reports display total events,
                    user participation, and system activity analytics.
                </p>
            </div>

        </div>

    </div>

</div>

@endsection