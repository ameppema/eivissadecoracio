<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon"/>

    <title>TEST</title>
</head>
<body>
    <header class="page-header">
        <nav>
            <div class="trigger-menu-wrapper">
                <button class="trigger-menu">
                    <svg width="12" height="12" viewBox="0 0 24 24">
                        <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/>
                    </svg>

                    <span>MENU</span>
                </button>
            </div>
        </nav>
    </header>

    <main class="page-main">
        <section style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/freedom.jpg);"></section>
        <section style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/travel.jpg);"></section>
        <section style="background-image:url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/162656/holidays.jpg);"></section>
    </main>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
