@extends('layouts.admin')
@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Banner Form</h1>
        <form method="POST" action="{{ route('admin.home.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="bannerImage" class="block text-gray-700 font-bold mb-2">Banner Image</label>
                <input type="file" id="bannerImage" name="banner_image" accept="image/*"
                    class="border border-gray-400 py-2 px-4 rounded-lg w-full">
            </div>
            <div class="mb-4">
                <label for="bannerText" class="block text-gray-700 font-bold mb-2">Banner Text</label>
                <x-dashboard.editor type="text" name="banner_text">

                </x-dashboard.editor>
            </div>
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Submit</button>
        </form>
    </div>
@endsection
