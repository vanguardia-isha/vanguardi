@extends('layouts.main')

@section('title', 'Profile - Product List')

@section('content')

@php
$user = \App\Models\User::find(session('user_id'));
@endphp

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

                <span style="font-size: 10px; color: {{ request()->routeIs('profile') ? '#4c3b8c' : '#64748b' }}; margin-top: 2px;">
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
    <div style="flex: 1; margin-left: 80px; background: #f0f4f8; min-height: 100vh;">

        <!-- Top Header -->
        <header style="background: #ffffff; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 100;">

            <h1 style="font-size: 24px; font-weight: 600; color: #334155; margin: 0;">
                Welcome {{ $user->name ?? 'Mark' }}!
            </h1>

        </header>

<!-- Main Content -->
<main style="background: #f0f4f8; padding: 20px; display: flex; align-items: center; justify-content: center; min-height: 550px;">

    <div style="max-width:2200px; width: 120%; margin: 0 auto;">

        <!-- Profile Card -->
        <div style="background: white; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,0.04); overflow: hidden;">

            <!-- Card Header -->
            <div style="background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%); padding: 15px 25px;">
                <h5 style="color: white; margin: 0; font-size: 16px; font-weight: 600;">Profile Information</h5>
            </div>

            <!-- Card Body -->
            <div style="padding: 20px;">

                <!-- Profile Picture Display -->
                <div style="text-align: center; margin-bottom: 15px;">

                    @if($user && $user->profile_picture)
                        <img src="{{ asset('uploads/' . $user->profile_picture) }}"
                             style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid #e0f2f1;"
                             alt="Profile">
                    @else
                        <div style="width: 100px; height: 100px; border-radius: 50%; background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%); margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 40px; border: 3px solid #e0f2f1;">
                            <i class="bi bi-person"></i>
                        </div>
                    @endif

                </div>

                <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 15px 0;">

                <!-- Update Info -->
                <form action="/profile/update" method="POST" style="margin-bottom: 15px;">
                    @csrf

                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 500; color: #334155; margin-bottom: 5px;">Full Name</label>

                        <input type="text"
                               name="name"
                               value="{{ $user->name ?? '' }}"
                               required
                               style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 13px; outline: none;">
                    </div>

                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 500; color: #334155; margin-bottom: 5px;">Email</label>

                        <input type="email"
                               name="email"
                               value="{{ $user->email ?? '' }}"
                               required
                               style="width: 100%; padding: 10px 12px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 13px; outline: none;">
                    </div>

                    <button type="submit" style="background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%); color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="bi bi-pencil-square"></i> Update Info
                    </button>
                </form>

                <hr style="border: none; border-top: 1px solid #e2e8f0; margin: 15px 0;">

                <!-- Upload Picture -->
                <form action="/profile/picture" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div style="margin-bottom: 12px;">
                        <label style="display: block; font-size: 13px; font-weight: 500; color: #334155; margin-bottom: 5px;">Profile Picture</label>

                        <input type="file"
                               name="profile_picture"
                               required
                               style="width: 100%; padding: 8px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 13px; background: white;">
                    </div>

                    <button type="submit" style="background: #10b981; color: white; border: none; padding: 10px 20px; border-radius: 6px; font-size: 13px; cursor: pointer; display: inline-flex; align-items: center; gap: 6px;">
                        <i class="bi bi-camera"></i> Upload Picture
                    </button>

                </form>

            </div>
        </div>
    </div>
</main>
    </div>
</div>

@endsection