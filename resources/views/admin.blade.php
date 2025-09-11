<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-200">
    <x-navbar name={{$name}}></x-navbar>
    <div class="container mx-auto mt-15 flex space-x-5">
        <div class="bg-white w-100 px-10 py-5 rounded-2xl shadow-lg flex items-center justify-between border border-gray-300">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#EA3323"><path d="m261-526 220-354 220 354H261ZM706-80q-74 0-124-50t-50-124q0-74 50-124t124-50q74 0 124 50t50 124q0 74-50 124T706-80Zm-586-25v-304h304v304H120Zm586.08-35Q754-140 787-173.08q33-33.09 33-81Q820-302 786.92-335q-33.09-33-81-33Q658-368 625-334.92q-33 33.09-33 81Q592-206 625.08-173q33.09 33 81 33ZM180-165h184v-184H180v184Zm189-421h224L481-767 369-586Zm112 0ZM364-349Zm342 95Z"/></svg>
                <h3 class="text-3xl font-bold">Categories</h3>
            </div>
            <div>
                <h1 class="font-bold text-5xl text-red-800">{{$categories}}</h1>
            </div>
        </div>
        <div class="bg-white w-100 px-10 py-5 rounded-2xl shadow-lg flex items-center justify-between border border-gray-300">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#48752C"><path d="M222-214 80-356l42-42 100 99 179-179 42 43-221 221Zm0-320L80-676l42-42 100 99 179-179 42 43-221 221Zm298 244v-60h360v60H520Zm0-320v-60h360v60H520Z"/></svg>
                <h3 class="text-3xl font-bold">Quiz</h3>
            </div>
            <div>
                <h1 class="text-5xl font-bold text-green-800">{{$categories}}</h1>
            </div>
        </div>
    </div>
</body>
</html>