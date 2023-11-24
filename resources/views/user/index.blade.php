@extends('layout')
@section('content')
<div class="container mx-auto">
    <div class="overflow-x-auto">
        <table class="w-full md:w-2/3 lg:w-1/2 xl:w-2/5 2xl:w-1/3 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-r">#</th>
                    <th class="py-2 px-4 border-b border-r">Name</th>
                    <th class="py-2 px-4 border-b border-r">Email</th>
                    <th class="py-2 px-4 border-b border-r">Category</th>
                    <!-- Add other headers as needed -->
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td class="py-2 px-4 border-b border-r">{{ $loop->iteration }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->email }}</td>
                        <td class="py-2 px-4 border-b border-r">{{ $item->email }}</td>
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