<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h1 class="text-2xl font-bold mb-4 text-gray-800">Student List</h1>
            <ul class="divide-y divide-gray-200">
                @foreach($students as $student)
                    <li class="py-2 flex justify-between">
                        <span class="text-gray-700">{{ $student['name'] }}</span>
                        <span class="text-gray-500">{{ $student['email'] }}</span>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4">
                <a href="/admin/students" class="inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">Go to Admin Panel</a>
            </div>
        </div>
    </div>
</body>
</html>