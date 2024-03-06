<!-- resources/views/components/GenericForm.blade.php -->

@props([
    'action' => '',

    'title' => 'Form title',
])

<div class="w-full ">
    <div class="">
        <div class="text-center">
            <h2 class="text-xl text-gray-800 font-bold sm:text-3xl dark:text-white">
                {{ $title }}
            </h2>
        </div>

        <!-- Card -->
        <div class=" ">
            <form action="{{ $action }}" method="POST" {{ $attributes }}>
                @csrf

                {{ $slot }}
                <div class="mt-6 grid">
                    <button type="submit"
                        class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">Submit</button>
                </div>
            </form>
        </div>
        <!-- End Card -->
    </div>
</div>
<!-- End Generic Form -->
