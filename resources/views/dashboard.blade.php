<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-2">Welcome, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-600">
                        You're logged in as: 
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium 
                            {{ Auth::user()->role === 'instructor' ? 'bg-purple-100 text-purple-800' : 'bg-blue-100 text-blue-800' }}">
                            {{ ucfirst(Auth::user()->role) }}
                        </span>
                    </p>

                    @if(Auth::user()->role === 'instructor')
                        <div class="mt-6">
                            <a href="{{ route('instructor.courses.index') }}" 
                               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                                Manage My Courses
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>