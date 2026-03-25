<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold mb-4">Meditation Summary</h3>

                <p>Total Sessions: {{ auth()->user()->sessions->count() }}</p>
                <p>Total Minutes: {{ auth()->user()->sessions->sum('duration') }}</p>

                <br>

                <a href="{{ route('sessions.create') }}" class="text-blue-500">➕ Add Session</a>
                <br><br>
                <a href="{{ route('sessions.index') }}" class="text-green-500">📜 View History</a>

            </div>

        </div>
    </div>
</x-app-layout>