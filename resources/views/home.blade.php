<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BMI calculator</title>
</head>

<body class="h-screen flex flex-col">
    <header class="flex justify-center font-bold text-3xl">
        <h1 class="p-4">BMI calculator</h1>
    </header>

    <div class="h-full flex flex-col items-center justify-center">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" method="POST" action="/">
            @csrf
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="height">
                    Height
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="height" name="height" placeholder="Your height in cm(e.g. 175)" required>
                @error('height')
                    <div class="text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="weight">
                    Weight
                </label>
                <input
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    type="text" id="weight" name="weight" placeholder="Your weight in kg(e.g. 60)" required>
                @error('weight')
                    <div class="text-red-400 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button
                    class="bg-sky-500 transition ease-in-out duration-300 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    type="submit">
                    Calculate body mass index
                </button>
            </div>
        </form>

        @isset($message)
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-6 mb-4 flex">
                <div>
                    <p>Your body mass index is: </p>
                    <p class="text-right">You are <span class="text-{{ $color }}-500">{{ $message }}</span></p>
                </div>
                <div class="flex
                            items-center ml-4">
                    <p class="text-5xl font-bold text-{{ $color }}-500">{{ $result }}</p>
                </div>
            </div>
        @endisset
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                BMI
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Less than 18.5
                            </th>
                            <td class="px-6 py-4">
                                Underweight
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                More than 18.5, less than 25
                            </th>
                            <td class="px-6 py-4">
                                Normal weight
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                More than 25, less than 30
                            </th>
                            <td class="px-6 py-4">
                                Overweight
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                More than 30
                            </th>
                            <td class="px-6 py-4">
                                Obesity
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
