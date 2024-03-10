@php
    if (!isset($jobs)) {
        $jobs = collect([
            [
                'id' => 1,
                'title' => 'Software Developer',
                'company' => auth()->user()->company->name,
                'location' => 'Remote',
            ],
        ]);
    }
@endphp
@extends('layouts.company')
@section('content')
    <x-dashboard.table>
        <x-slot:header>
            <div
                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-gray-700">
                <div>
                    <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">
                        Users
                    </h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400">
                        Add users, edit and more.
                    </p>
                </div>

                <div>
                    <div class="inline-flex gap-x-2">
                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="#">
                            View all
                        </a>

                        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('companies.jobs.create') }}">
                            <svg class="flex-shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 16 16" fill="none">
                                <path d="M2.63452 7.50001L13.6345 7.5M8.13452 13V2" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" />
                            </svg>
                            Create Job
                        </a>
                    </div>
                </div>
            </div>
        </x-slot:header>
        <x-dashboard.thead>
            <th scope="col" class="ps-6 py-3 text-start">
                <label for="hs-at-with-checkboxes-main" class="flex">
                    <input type="checkbox"
                        class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                        id="hs-at-with-checkboxes-main">
                    <span class="sr-only">Checkbox</span>
                </label>
            </th>

            <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Job title
                    </span>
                </div>
            </th>

            <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Company
                    </span>
                </div>
            </th>

            <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Status
                    </span>
                </div>
            </th>

            <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        salary
                    </span>
                </div>
            </th>

            <th scope="col" class="px-6 py-3 text-start">
                <div class="flex items-center gap-x-2">
                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-gray-200">
                        Created
                    </span>
                </div>
            </th>

            <th scope="col" class="px-6 py-3 text-end"></th>
        </x-dashboard.thead>

        <x-dashboard.tbody>
            @foreach ($jobs as $job)
                <tr>
                    <td class="size-px whitespace-nowrap">
                        <div class="ps-6 py-3">
                            <label for="hs-at-with-checkboxes-1" class="flex">
                                <input type="checkbox"
                                    class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                    id="hs-at-with-checkboxes-1">
                                <span class="sr-only">Checkbox</span>
                            </label>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3">
                            <div class="flex items-center gap-x-3">

                                <div class="grow">
                                    <span
                                        class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $job->title }}</span>

                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="h-px w-72 whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span
                                class="block text-sm font-semibold text-gray-800 dark:text-gray-200">{{ $job->company->user->name }}</span>

                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span
                                class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full dark:bg-teal-500/10 dark:text-teal-500">

                                {{ $job->status }}
                            </span>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <div class="flex items-center gap-x-3">
                                <span class="text-xs text-gray-500">{{ $job->salary }}</span>

                            </div>
                        </div>
                    </td>
                    <td class="size-px whitespace-nowrap">
                        <div class="px-6 py-3">
                            <span class="text-sm text-gray-500">{{ $job->created_at->format('F j, Y') }}</span>
                        </div>
                    </td>

                    <x-dashboard.action>
                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('companies.jobs.view', $job->id) }}">
                            View job
                        </a>
                        <a class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            href="{{ route('companies.jobs.edit', $job->id) }}">
                            Edit job
                        </a>
                        <div class="py-2 first:pt-0 last:pb-0">


                            <button
                                class="flex items-center gap-x-3 py-2 px-3 rounded-lg text-sm text-red-600 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-red-500 dark:hover:bg-gray-700 dark:hover:text-gray-300"
                                data-hs-overlay="#hs-basic-modal">
                                Delete
                            </button>

                        </div>

                    </x-dashboard.action>
                </tr>
            @endforeach
            <x-dashboard.modal :title="'Delete job'" id="hs-basic-modal">
                <p class="mt-1 text-gray-800 dark:text-gray-400">
                    Are you sure to delete this job?
                </p>
                <div
                    class="flex justify-end items-center gap-x-2 py-3 px-4 bg-gray-50 border-t dark:bg-gray-800 dark:border-gray-700">
                    <button type="button"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-white dark:hover:bg-gray-800 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                        data-hs-overlay="#hs-danger-alert">
                        Cancel
                    </button>
                    <form action="{{ route('companies.jobs.delete', $job->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button
                            class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-red-500 text-white hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                            type="submit">
                            Delete job
                        </button>
                    </form>

                </div>
            </x-dashboard.modal>
        </x-dashboard.tbody>
    </x-dashboard.table>
    {{-- {{ $jobs->links() }} --}}
    <!-- End Table Section -->
@endsection
