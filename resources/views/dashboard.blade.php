@extends('layouts.app')

@section('content')

<style>
    .dashboard-container {
        padding: 40px;
    }

    .dashboard-title {
        font-size: 55px;
        font-weight: bold;
        margin-bottom: 40px;
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-bottom: 50px;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .stat-title {
        color: gray;
        margin-bottom: 10px;
    }

    .stat-value {
        font-size: 40px;
        font-weight: bold;
        color: #2563eb;
    }

    .detail-item {
        display: flex;
        margin-bottom: 15px;
        font-size: 22px;
    }

    .detail-label {
        width: 120px;
        font-weight: bold;
    }

    .detail-separator {
        width: 20px;
    }
</style>

<div class="dashboard-container">

    <div class="dashboard-title">
        Dashboard Perpustakaan
    </div>

    <div class="stats-grid">

        <div class="stat-card">
            <div class="stat-title">Total Buku</div>
            <div class="stat-value">
                {{ $totalBooks }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Kategori</div>
            <div class="stat-value">
                {{ $totalCategories }}
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-title">Total Peminjaman</div>
            <div class="stat-value">
                {{ $totalBorrowings }}
            </div>
        </div>

    </div>

    <div class="detail-item">
        <div class="detail-label">Status</div>
        <div class="detail-separator">:</div>

        <div>
            @if(auth()->user()->role === 'admin')
            Admin
            @else
            Member
            @endif
        </div>
    </div>

    <div class="detail-item">
        <div class="detail-label">Nama</div>
        <div class="detail-separator">:</div>
        <div>{{ auth()->user()->name }}</div>
    </div>

    <div class="detail-item">
        <div class="detail-label">Email</div>
        <div class="detail-separator">:</div>
        <div>{{ auth()->user()->email }}</div>
    </div>

</div>

@endsection