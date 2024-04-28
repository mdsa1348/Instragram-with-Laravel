<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: rgb(180, 178, 178);
            overflow-y: scroll; 
        }
        .web_name{
            margin-top: 30vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: rgb(0, 0, 0);
            font-size: 104px;
        }

        .header-nav {
            
            height: 100%;
            width: 100%;
            display: flex;
            gap: 20px;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .header-nav a {
            color: rgb(0, 0, 0);
            text-decoration: none;
            font-size: 28px;
        }
        .header-nav a:hover {
            color: rgb(190, 67, 55);
        }
        .my{
            
            text-align: end;
            font-size: 20px;
            text-decoration: none;
            margin-right: 20px;
            margin-top: 30px;
        }
        .my a{
            color: rgb(0, 0, 0);
            font-weight: bold;
        }
        .my a:hover{
            color: rgb(190, 67, 55);
            font-weight: bold;
        }
        a:link {
            text-decoration: none;
        }
        .my_login{
            
            margin-right: 15px;
        }
        
        @media (max-width: 376px) {
            .my{
            font-size: 12px;
            
            margin-right: 10px;
            margin-top: 25px;
            }
            .web_name{
            margin-top: 6vh;
            
            font-size: 44px;
            }
            .header-nav {
            gap: 10px;
            
            }
            .header-nav a {
            
            font-size: 13px;
            }

        }
    </style>
</head>
<body>
    
    @if (Route::has('login'))
            <div class="my sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <a href="{{ url('/dashboard') }}"
                        class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="my_login font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                        in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="my_register ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
    
    <h1 class="web_name">LARAVEL</h1>
    
        
        <nav class="header-nav">
            <a href="#">Docs</a>
            <a href="#">Laracasts</a>
            <a href="#">Blog</a>
            <a href="#">Nova</a>
            <a href="#">Forge</a>
            <a href="#">GitHub</a>
        </nav>
    
</body>
</html>