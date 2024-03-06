<x-dashboard.accordian title="Education" :active="true">
    <button id="openModalBtn" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Open
        Modal</button>

    <x-modal id="hs-basic-modal">
        <x-slot:title>
            <h1 class="text-lg font-semibold mb-2">Modal Title</h1>
        </x-slot:title>

        <p>This is a modal. You can put any content here.</p>
        <button class="mt-4 bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">Close</button>
    </x-modal>>
    @include('includes.add-education')

    @include('includes.education-list')
    @include('includes.edit-education')

</x-dashboard.accordian>
