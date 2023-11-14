<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>
    {{ $title ?? 'Title' }}
</title>
<!-- Material Icons -->
<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

<!-- CSS Common File -->
<link id="pagestyle" href="{{ mix('/css/material-dashboard.css') }}" rel="stylesheet" />
<link href="{{ mix('/css/app.css') }}" rel="stylesheet" />

<!--CSS for each Page-->
@yield('assets')
