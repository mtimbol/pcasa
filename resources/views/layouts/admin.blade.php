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
    <link href="{{ asset('css/vendor.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="flex">
        <div class="w-1/4 px-6 py-6">
            <h3 class="py-8 text-grey-dark font-semibold">Navigation</h3>
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
