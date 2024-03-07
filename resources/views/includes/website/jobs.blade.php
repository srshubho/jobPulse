<div class="mt-6 lg:mt-10 grid grid-cols-1 space-y-4">
    @foreach ($jobs as $job)
        <x-dashboard.card>
            <x-slot:title>
                <div class="flex justify-between">
                    <p class="mt-1 text-gray-800 dark:text-gray-400">
                        {{ $job->title }}

                    </p>
                    <a class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded"
                        href="{{ route('job.details', $job->id) }}">View</a>
                </div>
            </x-slot:title>
        </x-dashboard.card>
    @endforeach
</div>
