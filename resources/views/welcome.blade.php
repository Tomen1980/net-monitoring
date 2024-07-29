@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <div class="min-h-screen flex items-center justify-center text-white bg-cover bg-center"
        style="background-image: url('https://images.unsplash.com/photo-1518770660439-4636190af475?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDF8fG5ldHdvcmt8ZW58MHx8fHwxNjI4MzQ5MjA1&ixlib=rb-1.2.1&q=80&w=1080');">
        <div class="bg-black bg-opacity-50 p-8 rounded-lg max-w-2xl text-center">
            <h1 class="text-4xl font-bold mb-4">Welcome to Network Monitoring</h1>
            <p class="text-lg mb-6">Monitor your network seamlessly and efficiently.</p>
            <div class="space-x-4">
                <a href="/register"
                    class="px-6 py-3 bg-indigo-600 rounded-md text-lg font-medium hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Register</a>
                <a href="/login"
                    class="px-6 py-3 bg-gray-800 rounded-md text-lg font-medium hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">Login</a>
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <div class="container mx-auto py-16 px-6">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Our Features</h2>
        <div class="grid gap-8 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
            <!-- Feature 1 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="https://images.unsplash.com/photo-1611328573001-13cf452dd8a9?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8cmVhbCUyMHRpbWV8ZW58MHx8MHx8fDA%3D" alt="Feature 1"
                    class="w-full h-48 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Real-Time Monitoring</h3>
                <p class="text-gray-700">Stay up-to-date with real-time network monitoring and alerts.</p>
            </div>
            <!-- Feature 2 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="https://plus.unsplash.com/premium_photo-1663013659189-58ff1c9e1976?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8YW5hbGlzaXN8ZW58MHx8MHx8fDA%3D" alt="Feature 2"
                    class="w-full h-48 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Detailed Analytics</h3>
                <p class="text-gray-700">Analyze network performance with detailed metrics and reports.</p>
            </div>
            <!-- Feature 3 -->
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <img src="https://media.istockphoto.com/id/1495819409/photo/digital-mind-brain-artificial-intelligence-concept.webp?b=1&s=170667a&w=0&k=20&c=rW0mL-FkO53lwhIHSyzxDafZMeoavzwdfuJb3U_ZBHU=" alt="Feature 3"
                    class="w-full h-48 object-cover rounded-t-lg mb-4">
                <h3 class="text-xl font-bold mb-2">Easy Integration</h3>
                <p class="text-gray-700">Easily integrate with your existing systems and infrastructure.</p>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto text-center">
            <p>&copy; 2024 Network Monitoring Telkom by JumantaraDev. All rights reserved.</p>
        </div>
    </footer>
@endsection
