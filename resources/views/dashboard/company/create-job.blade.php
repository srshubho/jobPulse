@php
    $title = 'Create Job';
@endphp
@extends('layouts.company')
@section('content')
    <!-- Card Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Grid -->

        <!-- Card -->
        <x-dashboard.form :title="'Create Job'" :action="route('companies.jobs.store')">
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Job Title</x-dashboard.label>
                <x-dashboard.input type="text" name="title" placeholder="Job Title" value="{{ old('title') }}" />
                @error('title')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Workplace</x-dashboard.label>
                <x-dashboard.select name="workplace" placeholder="Job Location">
                    <option value="">Select Location</option>
                    <option value="remote" @if (old('workplace') == 'remote') selected @endif>Remote</option>
                    <option value="on-site" @if (old('workplace') == 'on-site') selected @endif>On Site</option>
                    <option value="hybrid" @if (old('workplace') == 'hybrid') selected @endif>Hybrid</option>
                </x-dashboard.select>
                @error('workplace')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Job Type</x-dashboard.label>
                <x-dashboard.select name="type" placeholder="Job Type">
                    <option value="">Select Job Type</option>
                    <option value="full-time" @if (old('type') == 'full-time') selected @endif>Full Time</option>
                    <option value="part-time" @if (old('type') == 'part-time') selected @endif>Part Time</option>
                    <option value="internship" @if (old('type') == 'internship') selected @endif>Internship</option>
                    <option value="contract" @if (old('type') == 'contract') selected @endif>Contract</option>

                </x-dashboard.select>
                @error('type')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Job Location</x-dashboard.label>
                <x-dashboard.input type="text" name="location" placeholder="Job Location"
                    value="{{ old('location') }}" />
                @error('location')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Job Category</x-dashboard.label>
                <x-dashboard.select name="job_category_id" placeholder="Job Category">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('job_category_id') == $category->id) selected @endif>
                            {{ $category->title }}</option>
                    @endforeach
                </x-dashboard.select>
                @error('category')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Job Context</x-dashboard.label>
                <x-dashboard.editor type="text" name="context" placeholder="Job Description">
                    {!! old('context') !!}
                </x-dashboard.editor>
                @error('context')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Educational Requirements</x-dashboard.label>
                <x-dashboard.editor type="text" name="educational_requirement">
                    {!! old('educational_requirement') !!}
                </x-dashboard.editor>
                @error('educational_requirements')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Additional Requirements</x-dashboard.label>
                <x-dashboard.editor type="text" name="additional_requirement">
                    {!! old('additional_requirement') !!}
                </x-dashboard.editor>
                @error('additional_requirements')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Experience</x-dashboard.label>
                <x-dashboard.editor type="text" name="experience_requirement">
                    {!! old('experience_requirement') !!}
                </x-dashboard.editor>
                @error('experience_requirements')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Benefits</x-dashboard.label>
                <x-dashboard.editor type="text" name="benefits">
                    {!! old('benefits') !!}
                </x-dashboard.editor>
                @error('benefits')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Skills</x-dashboard.label>
                <x-dashboard.input type="text" name="skills" value="{{ old('skills') }}" />
                @error('skills')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Salary</x-dashboard.label>
                <x-dashboard.input type="number" name="salary" value="{{ old('salary') }}" />
                @error('salary')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Deadline</x-dashboard.label>
                <x-dashboard.input type="date" name="deadline" value="{{ old('deadline') }}" />
                @error('deadline')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>


        </x-dashboard.form>




        <!-- End Grid -->
    </div>
    <!-- End Card Section -->
@endsection
@section('scripts')
@endsection
