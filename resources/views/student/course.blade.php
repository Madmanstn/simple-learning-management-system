<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="font-semibold text-xl">{{ $course->title }}</h2>
                <p class="text-sm text-gray-600 mt-1">By {{ $course->instructor->name ?? 'Unknown' }}</p>
            </div>
            <div class="flex gap-2 items-center">
                <a href="{{ route('student.courses.index') }}" class="text-indigo-600 hover:text-indigo-700">Back</a>
                
                <!-- Apply Button in Header for Students -->
                @if(!$isInstructor)
                    @php
                        $isApplied = $course->students()->where('student_id', Auth::id())->exists();
                    @endphp

                    @if($isApplied)
                        <form action="{{ route('student.courses.withdraw', $course->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-6 py-2 bg-red-100 text-red-600 text-sm font-bold rounded-full hover:bg-red-200 transition border border-red-300">
                                Withdraw
                            </button>
                        </form>
                    @else
                        <form action="{{ route('student.courses.apply', $course->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="px-6 py-2 bg-green-100 text-green-600 text-sm font-bold rounded-full hover:bg-green-200 transition border border-green-300">
                                Apply Now
                            </button>
                        </form>
                    @endif
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-8 max-w-6xl mx-auto sm:px-6 lg:px-8">
        @if(session('success'))
            <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                {{ session('success') }}
            </div>
        @endif

        <!-- Course Content -->
        <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
            <p class="text-gray-700 mb-4">{{ $course->short_description }}</p>
            <div class="prose">
                {!! nl2br(e($course->content)) !!}
            </div>
        </div>

        <!-- Only show to instructor -->
        @if($isInstructor)
            <!-- Pending Applications Section -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg mb-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Pending Applications ({{ $course->students()->where('status', 'pending')->count() }})
                </h3>

                @php
                    $pendingStudents = $course->students()->where('status', 'pending')->get();
                @endphp

                @if($pendingStudents->isEmpty())
                    <p class="text-gray-600 text-center py-6">No pending applications yet.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Applied On</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingStudents as $student)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-2 font-medium">{{ $student->name }}</td>
                                        <td class="px-4 py-2">{{ $student->email }}</td>
                                        <td class="px-4 py-2">{{ $student->pivot->created_at->format('M d, Y') }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            <form action="{{ route('instructor.courses.accept', [$course->id, $student->id]) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-green-100 text-green-600 text-xs font-bold rounded-full hover:bg-green-200 transition border border-green-300">
                                                    Accept
                                                </button>
                                            </form>
                                            <form action="{{ route('instructor.courses.reject', [$course->id, $student->id]) }}" method="POST" class="inline">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-red-100 text-red-600 text-xs font-bold rounded-full hover:bg-red-200 transition border border-red-300">
                                                    Reject
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            <!-- Accepted Students Section -->
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">
                @php
                    $acceptedStudents = $course->students()->where('status', 'accepted')->get();
                @endphp

                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Students ({{ $acceptedStudents->count() }})
                </h3>

                @if($acceptedStudents->isEmpty())
                    <p class="text-gray-600 text-center py-6">No confirmed students yet.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="border-b bg-blue-50">
                                <tr>
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Confirmed On</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($acceptedStudents as $student)
                                    <tr class="border-b hover:bg-blue-50">
                                        <td class="px-4 py-2 font-medium">{{ $student->name }}</td>
                                        <td class="px-4 py-2">{{ $student->email }}</td>
                                        <td class="px-4 py-2">{{ $student->pivot->updated_at->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>