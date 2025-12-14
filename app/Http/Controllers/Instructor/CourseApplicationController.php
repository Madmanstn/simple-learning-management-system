<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800">
                {{ $course->title }} - Student Applications
            </h2>
            <a href="{{ route('instructor.courses.index') }}"
               class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">
                Back
            </a>
        </div>
    </x-slot>

    <div class="py-8 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">
                    Applications ({{ $course->students()->count() }})
                </h3>

                @if($course->students()->count() > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="border-b bg-gray-50">
                                <tr>
                                    <th class="px-4 py-2">Student Name</th>
                                    <th class="px-4 py-2">Email</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Applied On</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($course->students as $student)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="px-4 py-2 font-medium">{{ $student->name }}</td>
                                        <td class="px-4 py-2">{{ $student->email }}</td>
                                        <td class="px-4 py-2">
                                            <span class="px-2 py-1 rounded text-xs font-semibold
                                                @if($student->pivot->status === 'accepted') bg-green-100 text-green-800
                                                @elseif($student->pivot->status === 'rejected') bg-red-100 text-red-800
                                                @else bg-yellow-100 text-yellow-800
                                                @endif">
                                                {{ ucfirst($student->pivot->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-2">{{ $student->pivot->created_at->format('M d, Y') }}</td>
                                        <td class="px-4 py-2 flex gap-2">
                                            @if($student->pivot->status !== 'accepted')
                                                <form action="{{ route('instructor.courses.accept', [$course->id, $student->id]) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-3 py-1 bg-green-600 text-white text-xs rounded hover:bg-green-700">
                                                        Accept
                                                    </button>
                                                </form>
                                            @endif
                                            @if($student->pivot->status !== 'rejected')
                                                <form action="{{ route('instructor.courses.reject', [$course->id, $student->id]) }}" method="POST" class="inline">
                                                    @csrf
                                                    <button type="submit" class="px-3 py-1 bg-red-600 text-white text-xs rounded hover:bg-red-700">
                                                        Reject
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="text-gray-600">No applications yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>