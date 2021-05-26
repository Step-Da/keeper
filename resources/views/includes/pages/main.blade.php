@extends('layouts.account')

@section('account-site-title', 'Keeper - аккаунт ('. Auth::user()->name .')')

@section('content')
    @include('includes.widgets.counters')
    <div class="flex space-x-4 mt-3">
        <div class="flex-1 p-4 shadow rounded-lg bg-white border border-gray-100 doughnut-chart">
            <canvas id="doughnut-chart" width="500" height="300"></canvas>
        </div>

        <div class="flex-1 p-4 shadow rounded-lg bg-white border border-gray-100 doughnut-chart">
            <canvas id="polar-chart" width="500" height="300"></canvas>
        </div>
    </div> 
@endsection