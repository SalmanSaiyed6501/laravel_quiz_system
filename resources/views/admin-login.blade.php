<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-to-r from-green-300 to-blue-300 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm">
        <h2 class="text-2xl text-center font-bold text-gray-600 mb-6">Admin Login</h2>
        <form action="/admin" method="post" class="space-y-4">
            @csrf
            <div>
                <label for="" class="text-gray-600 mb-1">Admin Name</label>
                <input type="text" name="name" placeholder="Enter Admin Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
            </div>
            <div>
                <label for="" class="text-gray-600 mb-1">Password</label>
                <input type="password" name="password" placeholder="Enter Admin Password" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
            </div>
            <button type="submit" class="w-full bg-blue-500 rounded-xl text-white px-4 py-2">Login</button>
        </form>
    </div>
</body>
</html>