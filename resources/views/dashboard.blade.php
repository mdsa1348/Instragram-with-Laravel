<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
            
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                    <br>
                    <br>
                    <a href="{{route('product.index')}}" class="text-blue-500 hover:text-blue-950" >Product Page</a>
                </div>
            </div>
        </div>
    </div>
    <div>
        {{-- @can('update',$user->profile)
        <a href="/profile/{{$user->id}}/edit" style="width: 5.5vw;border: 1px solid rgb(136, 136, 136);">Edit Profile</a>
        @endcan --}}
        
    </div>
</x-app-layout>
