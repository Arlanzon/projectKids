<x-app-layout> 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Category Create') }} 
        </h2>
    </x-slot>
 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100"> 
                    <form method="POST" action="{{ route('categories.store') }}"> 
                        @csrf

                        <div class="mb-4">
                            <label 
                                for="name" 
                                class="block text-sm font-medium text-gray-800 dark:text-gray-300 mb-2"
                            >
                                Name:
                            </label>

                            <input 
                                type="text" 
                                name="name" 
                                id="name" 
                                class="w-1/3 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm
                                       bg-white text-gray-900 dark:bg-gray-900 dark:text-gray-100 dark:border-gray-700"
                                       value="{{ old('name')}}">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror          
                        </div>

                        <button 
                            type="submit"
                            class="
                                mt-2
                                inline-flex items-center 
                                px-4 py-2 
                                bg-gray-800 
                                dark:bg-gray-700
                                border border-transparent 
                                rounded-md font-semibold text-xs text-white uppercase tracking-widest 
                                hover:bg-gray-700 
                                focus:bg-gray-700 
                                active:bg-gray-900 
                                focus:outline-none 
                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 
                                transition ease-in-out duration-150
                            "
                        >
                            Save
                        </button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
