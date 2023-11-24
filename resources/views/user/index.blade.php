@section('content')
    <div class="container mx-auto mt-8">
        <table class="min-w-full bg-white border border-gray-300">
            <!-- Table header -->
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <!-- Add other headers as needed -->
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($data as $item)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $item->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $item->email }}</td>
                        <!-- Add other columns as needed -->
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $data->links() }}
    </div>
@endsection