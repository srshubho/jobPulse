<td class="size-px whitespace-nowrap">
    <div class="px-6 py-2">
        <div class="hs-dropdown relative inline-block [--placement:bottom-right]">
            <button id="hs-table-dropdown-1" type="button"
                class="hs-dropdown-toggle py-1.5 px-2 inline-flex justify-center items-center gap-2 rounded-lg text-gray-700 align-middle disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                <svg class="flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <circle cx="12" cy="12" r="1" />
                    <circle cx="19" cy="12" r="1" />
                    <circle cx="5" cy="12" r="1" />
                </svg>
            </button>
            <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-40 z-20 bg-white shadow-2xl rounded-lg p-2 mt-2 dark:divide-gray-700 dark:bg-gray-800 dark:border dark:border-gray-700"
                aria-labelledby="hs-table-dropdown-1">
                <div class="py-2 first:pt-0 last:pb-0">
                    <span class="block py-2 px-3 text-xs font-medium uppercase text-gray-400 dark:text-gray-600">
                        Actions
                    </span>
                    {{ $slot }}
                </div>

            </div>
        </div>
    </div>
</td>
