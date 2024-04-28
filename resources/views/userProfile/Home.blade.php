<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
            
        </h2>
        
    </x-slot>

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
            background: #ffffff;
        }
        .containe{
            display: flex;
            
            background-color: aqua;
            margin-left: 10vw;
            margin-right: 10vw;
            justify-content: center;
            align-items: center;

            .pr-3{
                font-weight: 450;
            }
        }
        
        .flex{
            display: flex;
        }
        
        .option a{
            background-color: rgb(255, 255, 255);
            border: none;
            border-radius: 8px;
            padding: 10px 3px;
            font-size: 15px;
            font-weight: bold;
        }
    </style>
    
    
    <div class="containe">
        <div class="row flex" style="align-items: center; width: 100%;  justify-content: center; ">
            <div class="col-3 p-5 " style="margin-left: -5vw;">
                
                <img src="{{ asset('images/download.png') }}" alt="Image" class="rounded-full ">

            </div>
            <div class="col-9 p-5 " style=" width: 40vw; ">
                <div class="d-flex justify-content-between align-items-baseline">
                    <h1 class="" style="font-size: 2.5vw;">
                    {{ $user->username }}</h1>
                    <div class="d-flex option" style=" margin-left: 15vw;">
                    
                        
                        @can('update',$user->profile) 
                            <a href="/p/create" style="width: 6.8vw; border: 1px solid rgb(136, 136, 136);margin-right: 1.5vw;">Add new post</a>
                        @endcan
                        @can('update',$user->profile)
                            <a href="/profile/{{$user->id}}/edit" style="width: 5.5vw;border: 1px solid rgb(136, 136, 136);">Edit Profile</a>
                        @endcan
                        

                    </div>

                </div>
                <div class="flex">
                    <div class="pr-3"><strong>{{$user->posts->count()}}</strong> posts</div>
                    <div class="pr-3"><strong>23k</strong> followers</div>
                    <div class="pr-3"><strong>212</strong> following</div>
                </div>
                <div class="pt-4 " style="font-weight: bold">{{$user->profile->title}}</div>
                <div class="pt-1">{{$user->profile->description}}</div>
                <div class="pt-2"><a href="#" class=" fw-bold ">{{$user->profile->url ?? 'N/A'}}</a></div>
            </div>
        </div>
    </div>

    <div class="containe pt-4 row" style="background-color: rgb(152, 152, 152);">
        @foreach ($user->posts as $post)
      
            <div class="col-4 pb-5">
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post ->image}}" alt="Image" class="">
                </a>
            </div>
        
        @endforeach 
        
    </div>
    

</x-app-layout>
