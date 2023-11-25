@extends('layout')
@section('content')
<div class="container mx-auto">
    <h4 class="text-2xl font-bold dark:text-white mb-5">Users</h4>
    <div class="overflow-x-auto">
        <table class="w-full md:w-2/3 lg:w-1/2 xl:w-2/5 2xl:w-1/3 bg-white border border-gray-300">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b border-r">#</th>
                    <th class="py-2 px-4 border-b border-r">Name</th>
                    <th class="py-2 px-4 border-b border-r">Email</th>
                    <th class="py-2 px-4 border-b border-r">Category</th>
                    <th class="py-2 px-4 border-b border-r">Action</th>
                    <!-- Add other headers as needed -->
                </tr>
            </thead>
            <!-- Table body -->
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="py-2 px-4 border-b border-r">{{ $loop->iteration }}</td>
                    <td class="py-2 px-4 border-b border-r">{{ $user->name }}</td>
                    <td class="py-2 px-4 border-b border-r">{{ $user->email }}</td>

                    <td class="py-2 px-4 border-b border-r">
                        {{-- @foreach($user->type_users()->get() as $type_user)
                        {{ $type_user->categorie_name }}
                        @endforeach --}}
                        @foreach ($user->categories as $category)
                        {{ $category->name }}
                        @if (!$loop->last)
                        ,
                        @endif
                        @endforeach
                    </td>
                    <td class="py-2 px-4 border-b border-r">
                        <a href="{{ route('user.edit', $user->id) }}">
                        <button type="button" class="px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            <i data-feather="edit" class="feather-16"></i>
                        </button>
                    </td>
                    <!-- Add other columns as needed -->
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $users->links() }}
    </div>
</div>
@endsection