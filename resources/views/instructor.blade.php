<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    Instructor Dashboard
                </h2>
                <p class="text-sm text-gray-600 mt-1">
                    Welcome back, {{ Auth::user()->name }}!
                </p>
            </div>
            <div class="text-sm text-gray-600">
                {{ now()->format('l, F j, Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- User Status Card -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
            <div class="p-6">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-indigo-100 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">Account Overview</h3>
                        <div class="mt-2 flex items-center">
                            <span class="px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                Instructor Account
                            </span>
                            <span class="ml-3 text-sm text-gray-600">
                                Member since {{ Auth::user()->created_at->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg min-h-[10px]">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <a href="{{ route('instructor.courses.index') }}"
                           class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                                <span class="font-medium text-gray-700">Manage Courses</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>

                        <a href="{{ route('instructor.courses.create') }}"
                           class="flex items-center justify-between p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors duration-150">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                </svg>
                                <span class="font-medium text-gray-700">Create New Course</span>
                            </div>
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Published Courses -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-2 min-h-[315px] mb-0.4">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Published Courses</h3>

                    <div class="flex space-x-4 overflow-x-auto pb-2">
                        @forelse($courses as $course)
                            <div class="flex-shrink-0 bg-white shadow-sm rounded-lg p-4 border border-gray-200 w-[240px] h-[260px]">
                                <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : 'https://via.placeholder.com/320x120' }}"
                                alt="Course Image"
                                class="rounded-md mb-2 w-full h-28 object-cover">

                            <div>
                                <div class="flex justify-between items-center mb-1">
                                    <h2 class="text-base font-semibold text-gray-800 truncate">{{ $course->title }}</h2>
                                </div>

                                <p class="text-gray-600 text-sm line-clamp-2">
                                    {{ \Illuminate\Support\Str::limit($course->short_description, 80) }}
                                </p>

                                <p class="text-xs text-gray-500 mt-2">
                                    {{ $course->enrolled_students_count > 0 
                                        ? $course->enrolled_students_count . ' student' . ($course->enrolled_students_count !== 1 ? 's' : '') . ' enrolled' 
                                        : 'No students enrolled yet' }}
                                </p>
                            </div>

                            <a href="{{ route('student.courses.show', $course->id) }}"
                                class="mt-2.5 inline-block px-3 py-1.5 bg-indigo-600 text-white text-xs rounded hover:bg-indigo-700 transition">
                                    View Course
                            </a>
                        </div>
                    @empty
                        <div class="text-center py-20 text-gray-500 w-full">
                            <p>No published courses yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- System Status -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg md:col-span-3">
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
