<div
    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-slate-900 dark:border-gray-700 dark:shadow-slate-700/[.7]">
    <div class="p-4 md:p-10">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
            {{ $title ?? '' }}
        </h3>
        {{ $slot }}
    </div>
</div>
