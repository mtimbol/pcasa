<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
</head>
<body class="px-8">
    <div class="flex pt-6 pb-2">
        <div class="w-1/4 px-4">
            <h1 class="text-grey-darker">Pcasa</h1>
        </div>
        <div class="w-full px-4">
            <div class="flex">
                <div class="w-full">
                    <div class="w-2/5">
                        <div class="relative">
                            <i class="fa fa-search absolute text-grey-dark mt-2 ml-3"></i>
                            <input class="shadow border rounded w-full px-3 py-2 pl-8" placeholder="Search for contacts" />
                        </div>
                    </div>
                </div>
                <div class="w-1/4">
                    <div class="flex justify-end">
                        <ul class="list-reset flex items-center">
                            <li class="mx-2">
                                <a href="#">
                                    <i class="fa fa-bullhorn text-grey text-xl"></i>
                                </a>
                            </li>                        
                            <li class="mx-2">
                                <a href="#">
                                    <i class="fa fa-book text-grey text-xl"></i>
                                </a>
                            </li>                        
                            <li class="mx-2">
                                <a href="#">
                                    <i class="fa fa-bell text-grey text-xl"></i>
                                </a>
                            </li>
                            <li class="ml-2">
                                <img src="/images/avatar.jpeg" alt="" title="" class="rounded-full w-8 h-8 mt-1 shadow" />
                            </li>
                        </ul>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <div class="flex">
        <div class="w-1/4 px-4 py-4 mt-3">
            <div class="mb-8">
                <ul class="list-reset">
                    <li class="mb-3">
                        <a href="{{ route('admin.index') }}" class="no-underline text-grey-darker hover:text-black">
                            <i class="fa fa-dashboard mr-1"></i> Dashboard
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mb-8">
                <p class="mb-4 text-grey uppercase tracking-wide font-bold text-xs">
                    Database
                </p>
                <ul class="list-reset">
                    <li class="mb-3">
                        <a href="{{ route('admin.contacts.index') }}" class="no-underline text-grey-darker hover:text-black">
                            <i class="fa fa-user-circle-o mr-1"></i> Contacts
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.contacts.index') }}" class="no-underline text-grey-darker hover:text-black">
                            <i class="fa fa-user-circle mr-1"></i> Leads
                        </a>
                    </li>                    
                </ul>
            </div>
            <div class="mb-8">
                <p class="mb-4 text-grey uppercase tracking-wide font-bold text-xs">
                    Statistics
                </p>
                <ul class="list-reset">
                    <li class="mb-3">
                        <a href="{{ route('admin.contacts.index') }}" class="no-underline text-grey-darker hover:text-black">
                            <i class="fa fa-line-chart mr-1"></i> Statistics
                        </a>
                    </li>
                    <li class="mb-3">
                        <a href="{{ route('admin.contacts.index') }}" class="no-underline text-grey-darker hover:text-black">
                            <i class="fa fa-file-archive-o mr-1"></i> Archive
                        </a>
                    </li>                    
                </ul>
            </div>            
        </div>
        <div class="w-full px-4 py-4">
            @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
