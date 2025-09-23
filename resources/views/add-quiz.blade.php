<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <x-navbar name={{$name}}></x-navbar>
    <div class="flex flex-col items-center min-h-screen pt-10">
        @if(!session('quizDetails'))
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md mb-5">
            <h2 class="text-2xl text-center font-bold text-gray-600 mb-6">Add Quiz</h2>
            <form action="/addQuiz" method="post" class="space-y-4">
                @csrf
                <div>
                    <label for="" class="text-gray-600 mb-1">Quiz Name</label>
                    <input type="text" name="name" placeholder="Enter Quiz Name" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
                    @error('name')
                        <div class="text-red-500">{{$message}}</div>
                    @enderror
                </div>
                <div>
                    <label for="" class="text-gray-600 mb-1">Category</label>
                    <select name="category" class="w-full px-4 py-2 border border-gray-300 rounded-xl">
                        <option value="">--Select Category--</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                       <div class="text-red-500">{{$message}}</div>
                   @enderror
                </div>
                <button type="submit" class="w-full bg-blue-500 rounded-xl text-white px-4 py-2 cursor-pointer">+ Add new</button>
            </form>
        </div>
        @else
        <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md mb-5">
            @if(Session('quiz'))
            <div class="bg-green-500 text-white p-2">{{Session('quiz')}}</div>
            @endif
            <span class="font-bold text-green-600">{{Session('quizDetails.name')}}</span><br>
            <span class="font-bold text-green-600">Total Questions : {{Session('count_mcq')}}
                @if(Session('count_mcq') > 0)
                 <span><a href="#" class="font-bold text-yellow-600">Show Questions</a></span>
                @endif
            </span>
            <h2 class="text-2xl text-center font-bold text-gray-600 mb-6">Add MCQs</h2>
            <form action="/addMcqs" method="post" class="space-y-4">
                @csrf
                <label for="">Question :</label>
                <textarea name="question" rows="2" placeholder="Add New Question" class="w-full px-4 py-2 border border-gray-300 rounded-xl" required></textarea>
                <label for="">Option A :</label>
                <input type="text" name="a" placeholder="Enter First Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl" required>
                <label for="">Option B :</label>
                <input type="text" name="b" placeholder="Enter Second Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl" required>
                <label for="">Option C :</label>
                <input type="text" name="c" placeholder="Enter Third Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl" required>
                <label for="">Option D :</label>
                <input type="text" name="d" placeholder="Enter Forth Option" class="w-full px-4 py-2 border border-gray-300 rounded-xl" required>
                 <select name="correct_ans" class="w-full px-4 py-2 border border-gray-300 rounded-xl" required>
                    <option value="">--Right Answer--</option>
                    <option value="a">Option A</option>
                    <option value="b">Option B</option>
                    <option value="c">Option C</option>
                    <option value="d">Option D</option>
                </select>
                <button type="submit" class="w-full bg-blue-500 rounded-xl text-white px-4 py-2 cursor-pointer">+ Add Question</button>
                <div class="text-center">
                    <a href="/quitQue" class="bg-red-500 rounded-xl text-white px-34 py-2 cursor-pointer">Add & Submit</a>
                </div>
            </form>
        </div>
        @endif
    </div>
</body>
</html>