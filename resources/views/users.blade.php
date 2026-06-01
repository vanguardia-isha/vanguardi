@extends('layouts.main')

@section('title', 'Users - Product List')

@section('content')

@php
$loggedUser = \App\Models\User::find(session('user_id'));
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

                <span style="font-size: 10px; color: #64748b; margin-top: 2px;">
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
    <div style="flex: 1; margin-left: 80px; background: #f0f4f8; min-height: 100vh;">

        <!-- Header -->
        <header style="background: #ffffff; padding: 20px 30px; display: flex; align-items: center; justify-content: space-between; box-shadow: 0 2px 10px rgba(0,0,0,0.05); position: sticky; top: 0; z-index: 100;">

            <h1 style="font-size: 24px; font-weight: 600; color: #334155; margin: 0;">
                Welcome {{ $loggedUser->name ?? 'User' }}!
            </h1>

            <div style="display: flex; align-items: center; gap: 20px;">

                <div style="position: relative;">
                    <input type="text"
                           placeholder="Search"
                           style="padding: 10px 40px 10px 15px; border: 1px solid #e2e8f0; border-radius: 25px; width: 280px; font-size: 14px; outline: none; background: #f8fafc; color: #334155;">

                    <i class="bi bi-search"
                       style="position: absolute; right: 15px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
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

        <main style="padding: 30px;">

            <!-- Header -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px;">

                <h2 style="font-size: 20px; font-weight: 600; color: #334155; margin: 0;">
                    User Management
                </h2>

                <!-- WORKING BUTTON -->
                <button
                    data-bs-toggle="modal"
                    data-bs-target="#addUserModal"
                    style="padding: 10px 20px; background: #3b82f6; color: white; border: none; border-radius: 8px; font-size: 14px; cursor: pointer; display: flex; align-items: center; gap: 8px; font-weight: 500;">

                    <i class="bi bi-plus-circle"></i> Add User
                </button>

            </div>

            <!-- Table -->
            <div style="background: white; border-radius: 16px; box-shadow: 0 2px 10px rgba(0,0,0,0.05); overflow: hidden;">

                <div style="padding: 20px;">

                    <table style="width: 100%; border-collapse: collapse; font-size: 14px;">

                        <thead>
                            <tr style="background: #f8fafc;">
                                <th style="padding: 12px; text-align: left;">ID</th>
                                <th style="padding: 12px; text-align: left;">Name</th>
                                <th style="padding: 12px; text-align: left;">Email</th>
                                <th style="padding: 12px; text-align: left;">Created Date</th>
                                <th style="padding: 12px; text-align: left;">Actions</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach($users as $user)

                            <tr style="border-top: 1px solid #f1f5f9;">

                                <td style="padding: 14px 12px;">{{ $user->id }}</td>

                                <td style="padding: 14px 12px; font-weight: 500;">
                                    {{ $user->name }}
                                </td>

                                <td style="padding: 14px 12px;">
                                    {{ $user->email }}
                                </td>

                                <td style="padding: 14px 12px;">
                                    {{ $user->created_at->format('M d, Y') }}
                                </td>

                                <td style="padding: 14px 12px;">

                                    <!-- WORKING EDIT BUTTON -->
                                    <button
                                        data-bs-toggle="modal"
                                        data-bs-target="#editUserModal{{ $user->id }}"
                                        style="padding: 6px 12px; background: #3b82f6; color: white; border: none; border-radius: 6px; font-size: 12px; cursor: pointer; margin-right: 8px;">

                                        Edit
                                    </button>

                                    <form action="{{ route('users.delete', $user->id) }}"
                                          method="POST"
                                          style="display:inline;"
                                          onsubmit="return confirm('Delete this user?')">

                                        @csrf

                                        <button type="submit"
                                                style="padding: 6px 12px; background: #ef4444; color: white; border: none; border-radius: 6px; font-size: 12px; cursor: pointer;">

                                            Delete
                                        </button>

                                    </form>

                                </td>

                            </tr>

                            <!-- EDIT MODAL -->
                            <div class="modal fade" id="editUserModal{{ $user->id }}" tabindex="-1">

                                <div class="modal-dialog">

                                    <div class="modal-content">

                                        <div class="modal-header" style="background:#4c3b8c; color:white;">

                                            <h5 class="modal-title">
                                                Edit User
                                            </h5>

                                            <button type="button"
                                                    class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal">
                                            </button>

                                        </div>

                                        <!-- SAME FUNCTION -->
                                        <form action="{{ route('users.update', $user->id) }}" method="POST">

                                            @csrf

                                            <div class="modal-body">

                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        Full Name
                                                    </label>

                                                    <input type="text"
                                                           name="fullname"
                                                           class="form-control"
                                                           value="{{ $user->name }}"
                                                           required>

                                                </div>

                                                <div class="mb-3">

                                                    <label class="form-label">
                                                        Email
                                                    </label>

                                                    <input type="email"
                                                           name="email"
                                                           class="form-control"
                                                           value="{{ $user->email }}"
                                                           required>

                                                </div>

                                            </div>

                                            <div class="modal-footer">

                                                <button type="button"
                                                        class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                    Close
                                                </button>

                                                <button type="submit"
                                                        class="btn btn-primary"
                                                        style="background:#4c3b8c; border:none;">
                                                    Update User
                                                </button>

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

<!-- ADD USER MODAL -->
<div class="modal fade" id="addUserModal" tabindex="-1">

    <div class="modal-dialog">

        <div class="modal-content">

            <div class="modal-header" style="background:#4c3b8c; color:white;">

                <h5 class="modal-title">
                    Add User
                </h5>

                <button type="button"
                        class="btn-close btn-close-white"
                        data-bs-dismiss="modal">
                </button>

            </div>

            <!-- SAME FUNCTION -->
            <form action="/users" method="POST">

                @csrf

                <div class="modal-body">

                    <div class="mb-3">

                        <label class="form-label">
                            Full Name
                        </label>

                        <input type="text"
                               name="fullname"
                               class="form-control"
                               required>

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                               name="email"
                               class="form-control"
                               required>

                    </div>

                </div>

                <div class="modal-footer">

                    <button type="button"
                            class="btn btn-secondary"
                            data-bs-dismiss="modal">
                        Close
                    </button>

                    <button type="submit"
                            class="btn btn-success">
                        Save User
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection