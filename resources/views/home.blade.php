<x-layouts.app>
    <div class="text-center mb-6 mt-10">
        <h1 class="text-4xl font-bold">One million checkboxes</h1>
    </div>
    <Scroller state="{{ $state }}" :count="{{ $count }}" />
</x-layouts.app>
