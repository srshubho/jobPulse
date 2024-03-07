@extends('layouts.admin')
@section('content')
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3  gap-3 sm:gap-6">
            <!-- Card -->

            <x-dashboard.card :title="__('Company')">

            </x-dashboard.card>

            <x-dashboard.card :title="__('Candidate')">

            </x-dashboard.card>

            <x-dashboard.card :title="__('Job')">

            </x-dashboard.card>

        </div>

        <!-- End Grid -->
    </div>
@endsection
<!-- End Card Section -->
@section('scripts')
@endsection
