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

                <!-- Course Card Example -->
                <div class="bg-white shadow-sm rounded-lg p-5 border border-gray-200">
                    <img src="https://via.placeholder.com/400x200" 
                         alt="Course Image" 
                         class="rounded-md mb-4 w-full h-40 object-cover">

                    <h2 class="text-lg font-semibold text-gray-800">Sample Course Title</h2>
                    <p class="text-gray-600 text-sm mt-1">Short course description goes here.</p>

                    <a href="#" 
                       class="mt-4 inline-block px-4 py-2 bg-indigo-600 text-white text-sm rounded hover:bg-indigo-700 transition">
                        View Course
                    </a>
                </div>

                <!-- More course cards can go here -->
            </div>

        </div>
    </div>
</x-app-layout>
