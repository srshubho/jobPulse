<div class="fixed z-10 inset-0 overflow-y-auto hidden" {{ $attributes }}>
    <div class="flex items-center justify-center min-h-screen">
        <div class="fixed inset-0 bg-gray-500 opacity-75"></div>
        <div class="bg-white rounded-lg overflow-hidden shadow-xl relative max-w-lg w-full">
            <!-- Modal Content -->
            <div class="p-4">
                {{ $title }}

                {{ $slot }}
            </div>
        </div>
    </div>
</div>
