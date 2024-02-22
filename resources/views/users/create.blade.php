@extends('layout.layout')

@section('title', 'Crear Stock')

@section('content')

    <div class="flex">

        <form class="max-w-sm w-2/3 mx-auto space-y-2" action="{{ route('users.store') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Name
                </label>
                <input value="{{ old('name') ?? '' }}" type="text" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your name" required />

                @error('name')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Email
                </label>
                <input value="{{ old('email') ?? '' }}" type="email" id="name" name="email"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="example@gmail.com" required />

                @error('email')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-5">
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Age
                </label>
                <input value="{{ old('age') ?? '' }}" type="number" id="amount" name="age"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="18" required />

                @error('age')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="mb-5">
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Description
                </label>
                <textarea name="description" placeholder="Add description"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    required>{{ old('description') ?? '' }}</textarea>
                @error('description')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div>
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">
                    Upload Avatar
                </label>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" name="avatar" id="file_input" type="file"
                    >
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX.
                    800x400px).</p>
                @error('avatar')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>

            <div class="mb-5">
                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Password
                </label>
                <input value="{{ old('password') ?? '' }}" type="password" id="amount" name="password"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="******" required />

                @error('password')
                    <small class="text-red-500">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="flex justify-center">
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create
                </button>
            </div>
        </form>

    </div>

@endsection
