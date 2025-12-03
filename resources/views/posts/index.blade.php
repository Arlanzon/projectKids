<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-white leading-tight">
        {{ __('Posts') }}
    </h2>
</x-slot>

 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @can('posts.create')
                        <a href="{{ route('posts.create') }}" 
                           class="px-3 py-2 bg-indigo-600 text-white rounded">
                           Add New Post
                        </a>
                    @endcan
                    <br /><br />
                    <table>
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category->name }}</td>
                                    <td>
                                        @can('posts.update')
                                            <a href="{{ route('posts.edit',$post) }}" class="text-blue-600">Edit</a>
                                        @endcan

                                        @can('posts.delete')
                                            <form action="{{ route('posts.destroy',$post) }}" method="POST" style="display:inline">
                                                @csrf @method('DELETE')
                                                <button class="text-red-600">Delete</button>
                                            </form>
                                        @endcan

                                        <a href="{{ route('posts.show',$post) }}" class="text-gray-800 font-semibold">
                                            Ver
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $posts->links() }}    
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>