<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Course') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form method="POST" action="{{ route('instructor.courses.update', $course) }}" 
                          enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">
                                Course Title
                            </label>
                            <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                value="{{ old('title', $course->title) }}"
                                required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="e.g., Introduction to Web Development">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Short Description -->
                        <div>
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">
                                Short Description
                            </label>
                            <textarea 
                                name="short_description" 
                                id="short_description" 
                                rows="3"
                                required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                placeholder="Write a brief description of your course (max 500 characters)">{{ old('short_description', $course->short_description) }}</textarea>
                            @error('short_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Full Content -->
                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700 mb-1">
                                Full Course Content
                            </label>
                            <textarea 
                                name="content" 
                                id="content" 
                                rows="12"
                                required
                                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 font-mono text-sm"
                                placeholder="Write your full lesson content here. You can include text, links to videos, or embed codes.">{{ old('content', $course->content) }}</textarea>
                            @error('content')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                You can include YouTube embed codes, links to resources, or any text content.
                            </p>
                        </div>

                        <!-- Course Image Upload -->
                        <div>
                            <label for="thumbnail" class="block text-sm font-medium text-gray-700 mb-1">
                                Course Image
                            </label>
                            <input 
                                type="file" 
                                name="thumbnail" 
                                id="thumbnail"
                                accept="image/*"
                                class="w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('thumbnail')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            @if($course->thumbnail)
                                <img src="{{ asset('storage/' . $course->thumbnail) }}" 
                                     alt="Course Image" 
                                     class="mt-2 w-48 rounded-md shadow">
                            @endif
                        </div>

                        <!-- File Uploads -->
                        <div>
                            <label for="resources" class="block text-sm font-medium text-gray-700 mb-1">
                                Upload Lesson Files
                            </label>
                            <input 
                                type="file" 
                                name="resources[]" 
                                id="resources" 
                                multiple
                                class="w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @error('resources')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">
                                You can upload PDFs, Word docs, or other supporting files.
                            </p>
                        </div>

                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <div class="flex gap-4">
                                <label class="flex items-center">
                                    <input 
                                        type="radio" 
                                        name="status" 
                                        value="draft" 
                                        {{ old('status', $course->status) === 'draft' ? 'checked' : '' }}
                                        class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                    <span class="ml-2 text-sm text-gray-700">Draft</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="radio" 
                                        name="status" 
                                        value="published"
                                        {{ old('status', $course->status) === 'published' ? 'checked' : '' }}
                                        class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                    <span class="ml-2 text-sm text-gray-700">Published</span>
                                </label>
                            </div>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Buttons -->
                        <div class="flex justify-between items-center pt-4 border-t">
                            <a href="{{ route('instructor.courses.index') }}" 
                               class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm font-medium hover:bg-gray-300">
                                Cancel
                            </a>
                            <button type="submit" 
                                    class="px-6 py-2 bg-indigo-600 text-white rounded-md text-sm font-semibold hover:bg-indigo-700">
                                Update Course
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>