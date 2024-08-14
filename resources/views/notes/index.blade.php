<x-app-layout>
    <div class="py-12">

        <div class="m-2 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Download CSV
                    <a href="{{ route('notes.download-csv') }}" class="px-5 bg-gray-500 rounded"> > </a>
                </div>
            </div>
        </div>


        <div class="m-2 max-w-7xl mx-auto sm:px-6 lg:px-8">

        @forelse ($notes as $note)
            <div class="m-5 text-white">
                <p> {{ $note->title }}</p>
                <br>
                <p class="text-red-500"> {{ $note->content }}</p>
            </div>

        @empty
            <div class="m-5 text-white">
                <p>No hay notas</p>
            </div>
        @endforelse

    </div>
    </div>
</x-app-layout>
