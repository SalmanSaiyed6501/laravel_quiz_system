<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <nav class="flex bg-white shadow-md px-15 py-3 justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Quiz System</h1>
        </div>
        <div class="space-x-3">
            <a href="" class="text-gray-600 hover:text-black hover:font-bold">Category</a>
            <a href="" class="text-gray-600 hover:text-black hover:font-bold">Quiz</a>
            <a href="#" class="text-gray-600 hover:text-black hover:font-bold">Welcome : {{$name}} </a>
            <a href="" class="text-gray-600 hover:text-black hover:font-bold">Logout</a>
        </div>
    </nav>
</body>
</html>