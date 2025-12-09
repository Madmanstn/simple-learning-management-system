<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Student Dashboard
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Welcome, {{ Auth::user()->name }}! Explore your courses and start learning.
                </p>
            </div>
            <div class="text-sm text-gray-600">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Learning Dashboard
                </h3>
                <div class="text-center py-8">
                    <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                              d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                    </svg>
                    <p class="text-gray-600 mb-4">You haven't enrolled in any courses yet</p>
                    <a href="{{ route('student.courses.index') }}" class="inline-flex ...">
    Browse Available Courses
</a>

                </div>
            </div>
        </div>

        <!-- System Status -->
        <div class="mt-6 bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 flex items-center justify-between">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900">System Status</h3>
                    <p class="text-sm text-gray-600 mt-1">All systems are operational</p>
                </div>
                <div class="flex items-center">
                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                    <span class="text-sm text-gray-700">Online</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
