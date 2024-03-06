<div id="add_education" class=" grid grid-cols-1 sm:grid-cols-2 mb-4 sm:mb-8 mt-4">
    <form action="{{ route('candidates.education.store') }}" method="POST">
        @csrf
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
            <div class="mb-4 sm:mb-8 mt-4 ">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Degree</x-dashboard.label>
                <x-dashboard.input type="text" name="degree" placeholder="Education" value="{{ old('degree') }}" />
                @error('degree')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8 mt-4 ">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Institute</x-dashboard.label>
                <x-dashboard.input type="text" name="institution" placeholder="Institute"
                    value="{{ old('institution') }}" />
                @error('institution')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8 mt-4 ">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">passing year</x-dashboard.label>
                <x-dashboard.input type="text" name="year" placeholder="passing year"
                    value="{{ old('year') }}" />
                @error('year')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8 mt-4 ">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Department</x-dashboard.label>
                <x-dashboard.input type="text" name="department" placeholder="Department"
                    value="{{ old('department') }}" />
                @error('department')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4 sm:mb-8 mt-4 ">
                <x-dashboard.label for="hs-feedback-post-comment-name-1">Result</x-dashboard.label>
                <x-dashboard.input type="text" name="result" placeholder="Result" value="{{ old('result') }}" />
                @error('result')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

        </div>
        <div class="text-center">
            <button type="submit" id="submit_education"
                class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
        </div>

    </form>
</div>
