@extends('ketua.layouts.default')

@php
$folder = 'dashboard';
@endphp

@section('title-page', $folder)
@section('title', $folder)

@section('content')
    <script async src="{{ mix('js/chart.js') }}"></script>
    <div class="col-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Surat Masuk</span>
                        <h4 class="mb-3">
                            <span class="counter-value" id="surat-masuk"></span>
                        </h4>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
    <div class="col-6">
        <!-- card -->
        <div class="card card-h-100">
            <!-- card body -->
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Surat Keluar</span>
                        <h4 class="mb-3">
                            <span class="counter-value" id="surat-keluar"></span>
                        </h4>
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->
    </div><!-- end col -->
@endsection

@section('scripts')

@endsection
