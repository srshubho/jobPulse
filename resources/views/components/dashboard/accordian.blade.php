@props(['title' => '', 'active' => false])
<div @class(['hs-accordion ', 'active' => $active]) id="hs-basic-heading-one">
    <button
        class="hs-accordion-toggle hs-accordion-active:text-blue-600 py-3 inline-flex items-center gap-x-3 w-full font-semibold text-start text-gray-800 hover:text-gray-500 rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:hs-accordion-active:text-blue-500 dark:text-gray-200 dark:hover:text-gray-400 dark:focus:outline-none dark:focus:text-gray-400"
        aria-controls="hs-basic-collapse-one">
        <svg class="hs-accordion-active:hidden block size-4" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <path d="M5 12h14" />
            <path d="M12 5v14" />
        </svg>
        <svg class="hs-accordion-active:block hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24"
            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <path d="M5 12h14" />
        </svg>
        {{ $title }}
    </button>
    <div id="hs-basic-collapse-one" @class([
        'hs-accordion-content',
        'w-full',
        'overflow-hidden',
        'transition-[height]',
        'duration-300',
        'hidden' => !$active,
    ]) aria-labelledby="hs-basic-heading-one">

        {{ $slot }}
    </div>
</div>
