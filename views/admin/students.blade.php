<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Student List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-6 text-gray-800">Admin Student List</h1>

            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Email</th>
                            <th class="py-2 px-4 border-b">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b text-center">{{ $student['id'] }}</td>
                            <td class="py-2 px-4 border-b">{{ $student['name'] }}</td>
                            <td class="py-2 px-4 border-b">{{ $student['email'] }}</td>
                            <td class="py-2 px-4 border-b">
                                <!-- Update Form (PUT) -->
                                <form action="/admin/student/{{ $student['id'] }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" placeholder="New name" class="border rounded px-2 py-1 text-sm focus:outline-none focus:ring-1 focus:ring-blue-500">
                                    <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600 transition ml-1">Update</button>
                                </form>

                                <!-- Delete Form (DELETE) -->
                                <form action="/admin/student/{{ $student['id'] }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Delete this student?')" class="bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600 transition">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6">
                <a href="/students-view" class="inline-block bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">Back to Public List</a>
            </div>
        </div>
    </div>
</body>
</html>