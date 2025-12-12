<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ $course->title }}
            </h2>
            <div class="text-xs text-gray-500">
                Created: {{ $course->created_at->format('M j, Y') }} • Updated {{ $course->updated_at->diffForHumans() }}
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white p-6 shadow-sm sm:rounded-lg">
            <p class="text-gray-700 mb-4">{{ $course->short_description }}</p>
            <div class="prose">
                {!! nl2br(e($course->content)) !!}
            </div>
            
            <div class="mt-4 flex justify-end">
                @if(Auth::id() === $course->instructor_id)
                    <!-- Instructor sees Edit -->
                    <a href="{{ route('instructor.courses.edit', $course->id) }}"
                       class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition">
                        Edit Course
                    </a>
                @else
                    <!-- Students see Apply -->
                    <a href="{{ route('student.courses.show', $course->id) }}"
                       class="px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition">
                        Apply Course
                    </a>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>