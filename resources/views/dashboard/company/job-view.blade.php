@extends('layouts.company')

@section('content')


    <div class="flex flex-col gap-3">
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-white">{{ $job->title }}</h1>
        <h3 class="text-xl font-bold text-center text-teal-800 dark:text-white">{{ $job->company->user->name }}</h3>
        <x-dashboard.card :title="__('Job Context')">
            {!! $job->context !!}
        </x-dashboard.card>
        <x-dashboard.card :title="__('Job Benefits')">
            {!! $job->context !!}
        </x-dashboard.card>

    </div>


@overwrite
