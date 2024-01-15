<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body>
    
    <nav class="flex justify-center pt-6" aria-label="Breadcrumb" >
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
        <li class="inline-flex items-center">
        <a href="{{ route('fruit.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
            </svg>
            Fruits
        </a>
        </li>
        <li>
        <div class="flex items-center">
            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <a href="{{ route('fruit.create') }}" class="ms-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ms-2">Add Fruits</a>
        </div>
        </li>
    </ol>
    </nav>

    <h4 class="mb-2 mt-4 text-2xl font-medium leading-tight text-primary text-center">List of Fruits</h4>
    <div class="mb-2 flex items-center justify-center">
    @if(session()->has('added') || session()->has('success') || session()->has('deleted'))
        <div class="text-2xl font-bold  ">
            @if(session()->has('added') || session()->has('success'))
                <div class="bg-green-200 border-green-600 text-green-600 border-l-4">
                    {{ session('added') ?? session('success') }}
                </div>
            @else
                <div class="bg-red-200 border-red-600 text-red-600 border-l-4">
                    {{ session('deleted') }}
                </div>
            @endif
        </div>
    @endif
    </div>
    <div class="pt-6 max-w-screen-xl mx-auto">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <span class="sr-only">Delete</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fruits as $fruit)
                        <tr class="bg-white border-b">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$fruit->id}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{$fruit->name}}
                            </th>
                            <td class="px-6 py-4">
                                {{$fruit->quantity}}
                            </td>
                            <td class="px-6 py-4">
                                {{$fruit->price}}
                            </td>
                            <td class="px-6 py-4">
                                {{$fruit->description}}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="{{route('fruit.edit', ['fruit' => $fruit])}}" class="font-medium text-blue-600 hover:underline">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('fruit.destroy', ['fruit' => $fruit]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="font-medium text-red-600 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>