{{-- @dd($job) --}}
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-semibold mb-4">{{ $job->title }}</h1>
    <p class="text-gray-600">{{ $job->company->user->name }} </p>
    <p class="text-gray-600">{{ $job->workplace }} </p>
    <div class="border-t border-b border-gray-300 my-4"></div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Job Context</h2>
        <p class="text-gray-700">
            {!! $job->context !!}
        </p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Experience</h2>
        <p class="text-gray-700">
            {!! $job->experience_requirement !!}
        </p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Educational Requirements</h2>
        <p class="text-gray-700">
            {!! $job->educational_requirement !!}
        </p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Additional Requirements</h2>
        <p class="text-gray-700">
            {!! $job->additional_requirement !!}
        </p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Skills</h2>
        <p class="text-gray-700">
            {{ $job->skills }}
        </p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Benefits</h2>
        <p class="text-gray-700">
            {!! $job->benefits !!}
        </p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Salary</h2>
        <p class="text-gray-700">{{ $job->salary }} BDT</p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Type of Job</h2>
        <p class="text-gray-700">{{ $job->type }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Job Deadline</h2>
        <p class="text-gray-700">{{ $job->deadline() }}</p>
    </div>

    <div class="mb-6">
        <h2 class="text-xl font-semibold mb-2">Job Publish Time</h2>
        <p class="text-gray-700">{{ $job->approved_at }}</p>
    </div>
</div>
