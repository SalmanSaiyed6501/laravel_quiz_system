<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar name={{$name}}></x-navbar>
    @if(Session('category'))
    <div class="bg-green-500 text-white p-2">{{Session('category')}}</div>
    @endif
    <div class="flex flex-col items-center min-h-screen pt-10">
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-sm mb-5">
            <h2 class="text-2xl text-center font-bold text-gray-600 mb-6">Add Category</h2>
            <form action="/addCategory" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="" class="text-gray-600 mb-1">Category Name</label>
                    <input type="text" name="name" placeholder="Enter Category" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
                    @error('name')
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 rounded-xl text-white px-4 py-2 cursor-pointer">+ Add new</button>
            </form>
        </div>
        <div class="w-200">
            <h1 class="text-2xl text-blue-500 font-bold mb-3">Categories List</h1>
            <ul class="border border-gray-200">
                <ul class="flex justify-between font-bold p-2">
                    <li class="w-30">Sr.No.</li>
                    <li class="w-70">Category</li>
                    <li class="w-70">Creator</li>
                    <li class="w-30">#</li>
                </ul>
                @foreach($categories as $category)
                <li class="even:bg-gray-300 p-2">
                    <ul class="flex justify-between">
                        <li class="w-30">{{$category->id}}</li>
                        <li class="w-70">{{$category->name}}</li>
                        <li class="w-70">{{$category->creator}}</li>
                        <li class="w-30">
                            <a href="category/delete/{{$category->id}}" onclick="return confirm('Are You Want to Delete this ?');">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#000000"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm400-600H280v520h400v-520ZM360-280h80v-360h-80v360Zm160 0h80v-360h-80v360ZM280-720v520-520Z"/></svg>
                            </a>
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>