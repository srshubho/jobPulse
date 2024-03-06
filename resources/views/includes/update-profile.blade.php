<div class="grid grid-cols-1  gap-2">
    <div class="mb-4 sm:mb-8">
        <h1 class="text-2xl font-bold text-center text-gray-800 dark:text-white">{{ __('Profile') }}</h1>
        <form action="{{ route('candidates.update') }}" method="POST">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Full Name</x-dashboard.label>
                    <x-dashboard.input type="text" name="full_name" placeholder="Full Name"
                        value="{{ old('full_name') }}" />
                    @error('full_name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Father Name</x-dashboard.label>
                    <x-dashboard.input type="text" name="father_name" placeholder="Father Name"
                        value="{{ old('father_name') }}" />
                    @error('father_name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Mother Name</x-dashboard.label>
                    <x-dashboard.input type="text" name="mother_name" placeholder="Mother Name"
                        value="{{ old('mother_name') }}" />
                    @error('mother_name')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Date of Birth</x-dashboard.label>
                    <x-dashboard.input type="date" name="date_of_birth" placeholder=" Date of Birth"
                        value="{{ old('date_of_birth') }}" />
                    @error('date_of_birth')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Gender</x-dashboard.label>
                    <x-dashboard.select name="gender" placeholder="Gender">
                        <option value="">Select Gender</option>
                        <option value="male" @if (old('gender') == 'male') selected @endif>Male</option>
                        <option value="female" @if (old('gender') == 'female') selected @endif>Female</option>
                    </x-dashboard.select>
                    @error('gender')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Blood Group</x-dashboard.label>
                    <x-dashboard.select name="blood_group" placeholder="Blood Group">
                        <option value="">Select Blood Group</option>
                        <option value="a+" @if (old('blood_group') == 'a+') selected @endif>A+</option>
                        <option value="a-" @if (old('blood_group') == 'a-') selected @endif>A-</option>
                        <option value="b+" @if (old('blood_group') == 'b+') selected @endif>B+</option>
                        <option value="b-" @if (old('blood_group') == 'b-') selected @endif>B-</option>
                        <option value="o+" @if (old('blood_group') == 'o+') selected @endif>O+</option>
                        <option value="o-" @if (old('blood_group') == 'o-') selected @endif>O-</option>
                        <option value="ab+" @if (old('blood_group') == 'ab+') selected @endif>AB+</option>
                        <option value="ab-" @if (old('blood_group') == 'ab-') selected @endif>AB-</option>
                    </x-dashboard.select>
                    @error('blood_group')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror

                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Phone</x-dashboard.label>
                    <x-dashboard.input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" />
                    @error('phone')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Emergency Contact</x-dashboard.label>
                    <x-dashboard.input type="text" name="emergency_contact" placeholder="Emergency Contact"
                        value="{{ old('emergency_contact') }}" />
                    @error('emergency_contact')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Summary</x-dashboard.label>
                    <textarea
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        rows="3" placeholder="Summary" name="summary">{{ old('summary') }}</textarea>
                    @error('summary')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Skills</x-dashboard.label>
                    <textarea
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        rows="3" placeholder="Skills" name="skills">{{ old('skills') }}</textarea>
                    @error('skills')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Address</x-dashboard.label>
                    <textarea
                        class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600"
                        rows="3" placeholder="Address" name="address">{{ old('address') }}</textarea>
                    @error('address')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Website</x-dashboard.label>
                    <x-dashboard.input type="text" name="website" placeholder="Website"
                        value="{{ old('website') }}" />
                    @error('website')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Submit</button>
            </div>
        </form>

    </div>


</div>
