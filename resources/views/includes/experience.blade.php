<x-dashboard.accordian title="Experience">
    {{-- {{ json_encode($errors->all()) }} --}}

    <div id="add_experience" class=" grid grid-cols-1 sm:grid-cols-2 mb-4 sm:mb-8 mt-4">
        <form action="{{ route('candidates.experience.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Designation</x-dashboard.label>
                    <x-dashboard.input type="text" name="designation" placeholder="Designation"
                        value="{{ old('designation') }}" />
                    @error('designation')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Company</x-dashboard.label>
                    <x-dashboard.input type="text" name="company" placeholder="Company"
                        value="{{ old('company') }}" />
                    @error('company')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Joining Date</x-dashboard.label>
                    <x-dashboard.input type="date" name="joining_date" value="{{ old('joining_date') }}" />
                    @error('joining_date')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4 sm:mb-8 mt-4 ">
                    <x-dashboard.label for="hs-feedback-post-comment-name-1">Departure Date</x-dashboard.label>
                    <x-dashboard.input type="date" name="departure_date" value="{{ old('departure_date') }}" />
                    @error('departure_date')
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
    <table class="w-full">
        <thead>
            <tr>
                <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Designation
                </th>
                <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Company
                </th>
                <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Joining Date
                </th>
                <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Departure Date
                </th>
                <th class="py-3 px-6 bg-gray-200 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach ($candidate->experiences as $experience)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $experience->designation }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $experience->company }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $experience->joining_date }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium">{{ $experience->departure_date }}</span>
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <div class="flex items-center">
                            <span class="font-medium text-red-500"><a href="">Edit</a></span>
                        </div>
                        <div class="flex items-center">
                            <span class="font-medium text-red-500"><a href="">Delete</a></span>
                        </div>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</x-dashboard.accordian>
