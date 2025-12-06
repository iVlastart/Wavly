<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create a new video') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg flex justify-center items-center">
                <form action="{{ route('video.store') }}" method="POST" id="uploadForm" enctype="multipart/form-data" class="w-full max-w-lg p-6">
                    @csrf
                    <div class="p-2">
                        <div class="mt-4">
                            <x-input-label for="file_input" :value="__('Chose your video')" class="mb-1"/>

                            <input name="src" class="block w-full text-sm text-gray-900 border 
                                    border-gray-300 rounded-lg cursor-pointer bg-gray-50" 
                                    id="file_input" type="file">
                            <p class="mt-1 text-sm text-gray-500" id="file_input_help">MP4 (MAX. 5GB).</p>
                            <x-input-error :messages="$errors->get('src')" class="mt-2"/>
                        </div>
                                
                        <div class="mt-4">
                            <x-input-label for="Title" :value="__('Title')"/>
                            <x-textarea-input name="title" id="Title" class="block mt-1 w-full" :value="__('')"
                                     maxlength="500"/>
                            <x-input-error :messages="$errors->get('descr')" class="mt-2"/>
                        </div>
                                

                        <div class="mt-4">
                            <x-input-label for="Visibility" :value="__('Visibility')" class="mb-1"/>
                            <select id="Visibility" name="visibility" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                                <option value="public">{{__('Public')}}</option>
                                <option value="private">{{__('Private')}}</option>
                            </select>
                        </div>
                                
                        <div class="mt-4 text-center">
                            <x-primary-button align="center">
                                Upload
                            </x-primary-button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> 
</x-app-layout>