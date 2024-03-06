@extends('layouts.app')
@section('content')
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 md:grid-cols-3  gap-3 sm:gap-6">
            <!-- Card -->

            <x-dashboard.card :title="__('Company')">

            </x-dashboard.card>


        </div>

        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
@endsection
@section('scripts')
@endsection
