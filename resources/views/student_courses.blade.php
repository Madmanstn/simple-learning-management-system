
<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Page Title -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 border-b border-gray-200">
                    <h1 class="text-2xl font-bold text-gray-800">Browse Courses</h1>
                    <p class="text-gray-600 mt-1">Here are all available courses you can enroll in.</p>
                </div>
            </div>

            <!-- Course List -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($courses as $course)
                    <div class="bg-white shadow-sm rounded-lg p-5 border border-gray-200">
                        <img src="{{ $course->thumbnail ? asset('storage/' . $course->thumbnail) : 'https://via.placeholder.com/400x200' }}"
                             alt="Course Image"
                             class="rounded-md mb-4 w-full h-40 object-cover">

                        <h2 class="text-lg font-semibold text-gray-800">{{ $course->title }}</h2>
                        <p class="text-gray-600 text-sm mt-1">
                            {{ \Illuminate\Support\Str::limit($course->short_description, 120) }}
                        </p>

                        <p class="text-xs text-gray-500 mt-2">
                            By {{ $course->instructor->name ?? 'Unknown' }}
                        </p>

                        <div class="text-xs text-gray-500 mt-2">
                            {{ $course->created_at->format('M j, Y') }} • Updated {{ $course->updated_at->diffForHumans() }}
                        </div>

                        <a href="{{ route('student.courses.show', $course->id) }}"
                           class="mt-4 inline-block px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition">
                            View Course
                        </a>
                    </div>
                @empty
                    <div class="col-span-1 md:col-span-2 lg:col-span-3 bg-white shadow-sm rounded-lg p-6 border border-gray-200 text-center">
                        <p class="text-gray-600">No courses available right now. Check back later.</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-6">
                {{ $courses->links() }}
            </div>

        </div>
    </div>
</x-app-layout>