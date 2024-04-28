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
            display: block;
            
            margin-top: 2vh;
            margin-left: 10vw;
            margin-right: 10vw;
            justify-content: center;
            align-items: center;

            .pr-3{
                font-weight: 450;
            }
        }
        
    </style>
    
        
    <div class="containe">

        <div class="row " style="text-align: center;font-size: 40px">

            <h1 class="" ><u>create User Profile</u></h1>
            <br><br>
        </div>
        <form  action="/profile/{{$user->id}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')

            <div class="form-group row w-100">
                <div class="col-md-4 mt-2">
                    <x-input-label style="text-align: end; padding-top:6px" for="title" :value="__('Title')" />
                </div>
                <div class="col-md-5 ">
                    <x-text-input id="title" class=" form-control flex mt-1 w-full" type="text" name="title" :value="old('title') ?? $user->profile->title " required autofocus autocomplete="title" />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>
            </div>
            <div class="form-group row w-100">
                <div class="col-md-4 mt-2">
                    <x-input-label style="text-align: end; padding-top:6px" for="description" :value="__('Description')" />
                </div>
                <div class="col-md-5">
                    <x-text-input id="description" class=" form-control flex mt-1 w-full" type="text" name="description" :value="old('description')  ?? $user->profile->description " required autofocus autocomplete="description" />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>
            </div>
            <div class="form-group row w-100">
                <div class="col-md-4 mt-2">
                    <x-input-label style="text-align: end; padding-top:6px" for="url" :value="__('URL')" />
                </div>
                <div class="col-md-5 ">
                    <x-text-input id="url" class=" form-control flex mt-1 w-full" type="text" name="url" :value="old('url')  ?? $user->profile->url " required autofocus autocomplete="url" />
                    <x-input-error :messages="$errors->get('url')" class="mt-2" />
                </div>
            </div>
            <br>
            <div class="row "> 
                <div class="col-md-4 mt-1 d-flex" style=" width: 85%; justify-content: center;">
                    <x-input-label style="text-align:center ; padding-top:px;width: 9vw;"  for="image" :value="__('Profile Image')" />
                    <input type="file",class ="form-control-file" id="image" name="image">
                    <br>
                    
                </div>
                <x-input-error :messages="$errors->get('image')" class="mt-2 " style="margin-left: 20vw" />
            </div>

            <div class="row mt-5 " style="background-color: red; 
                justify-content: center;">

                <button class="btn btn-primary w-40" >Save Profile</button>

            </div>
        </form>
    </div>
    

</x-app-layout>
