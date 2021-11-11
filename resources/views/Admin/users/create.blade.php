<x-app-layout>
    <x-slot name="header">
        <span class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add User') }}
        </span>
        <a href="{{route('users.index')}}" class="float-right leading-tight bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
            Back
        </a>
    </x-slot>

    <div class="hidden sm:block" aria-hidden="true">
        <div class="py-5">
            <div class="border-t border-gray-200"></div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <div class="min-w-full divide-y divide-gray-200">
                                <form class="p-4" method="POST" action="{{ route('users.store') }}">
                                    @csrf
                                    <input type="hidden" value='POST' name="_method">
                                    <div>
                                        <x-jet-label for="name" value="{{ __('Name') }}" />
                                        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="email" value="{{ __('Email') }}" />
                                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="address" value="{{ __('Address') }}" />
                                        <x-jet-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="role" value="{{ __('Role') }}" />
                                        <select id="role" class="block mt-1 w-full" name="role">
                                            <option value="user">
                                                User
                                            </option>
                                            @if(Auth::user()->role == 'admin')
                                            <option value="admin">
                                                Admin
                                            </option>
                                            @endif
                                        </select>
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="password" value="{{ __('Password') }}" />
                                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                                    </div>

                                    <div class="mt-4">
                                        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                                        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                                    </div>

                                    <div class="flex items-center justify-end mt-4">
                                        <x-jet-button class="ml-4">
                                            {{ __('Add') }}
                                        </x-jet-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>