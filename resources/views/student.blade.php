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
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        @if(session('info'))
            <div class="mb-4 bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative">
                {{ session('info') }}
            </div>
        @endif

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Learning Dashboard
                </h3>

                @if($appliedCourses->isEmpty())
                    <div class="text-center py-8">
                        <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1"
                                  d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <p class="text-gray-600 mb-4">You haven't applied to any courses yet</p>
                        <a href="{{ route('student.courses.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700">
                            Browse Available Courses
                        </a>
                    </div>
                @else
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($appliedCourses as $course)
                            <div class="bg-gradient-to-br from-indigo-50 to-blue-50 border border-indigo-200 rounded-lg p-5 hover:shadow-md transition">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-lg font-semibold text-gray-900 flex-1">{{ $course->title }}</h4>
                                    <span class="px-2 py-1 rounded text-xs font-semibold
                                        @if($course->pivot->status === 'accepted') bg-green-100 text-green-800
                                        @elseif($course->pivot->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-yellow-100 text-yellow-800
                                        @endif">
                                        {{ ucfirst($course->pivot->status) }}
                                    </span>
                                </div>

                                <p class="text-sm text-gray-600 mb-2">
                                    {{ \Illuminate\Support\Str::limit($course->short_description, 100) }}
                                </p>

                                <p class="text-xs text-gray-500 mb-3">
                                    By {{ $course->instructor->name ?? 'Unknown' }}
                                </p>

                                <div class="flex gap-2">
                                    <a href="{{ route('student.courses.show', $course->id) }}"
                                       class="flex-1 px-3 py-2 bg-indigo-600 text-white text-xs font-medium rounded hover:bg-indigo-700 transition text-center">
                                        View Details
                                    </a>
                                    <form action="{{ route('student.courses.withdraw', $course->id) }}" method="POST" class="flex-1">
                                        @csrf
                                        <button type="submit" class="w-full px-3 py-2 bg-red-100 text-red-700 text-xs font-medium rounded hover:bg-red-200 transition">
                                            Withdraw
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('student.courses.index') }}" class="text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                            Browse More Courses →
                        </a>
                    </div>
                @endif
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