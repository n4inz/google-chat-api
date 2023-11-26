@extends('layout')
@section('content')
<div class="container mx-auto">
    <h4 class="text-2xl font-bold dark:text-white mb-5">Category</h4>
    <a href="{{ route('category.add') }}">
    <button type="button" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 inline-flex"><i data-feather="plus"></i> Add</button>
</a>
    <div class="overflow-x-auto">
        <table class="w-full md:w-2/3 lg:w-1/2 xl:w-2/5 2xl:w-1/3 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-r">#</th>
                    <th class="py-2 px-4 border-b border-r">Category Name</th>
                    <th class="py-2 px-4 border-b border-r">Action</th>
                    <!-- Add other headers as needed -->
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td class="py-2 px-4 border-b border-r">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b inline-flex gap-2 w-full">
                                <a href="{{ route('category.edit', $item->id) }}">
                                <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <i data-feather="edit" class="feather-16"></i>
                                </button>
                                </a>
                                <form method="POST" class="" action="{{ route('category.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')
        
                                    <button type="submit" class="px-3 py-2 text-xs font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800" onclick="return confirm('Are you sure you want to delete this category?')">
                                        <i data-feather="trash" class="feather-16"></i>
                                    </button>
                                </form>
                        </td>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $data->links() }}
    </div>
</div>
@endsection