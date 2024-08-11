<head>

    <meta charset="utf-8">
    <title>Analytics | Tailwick - Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta content="Minimal Admin & Dashboard Template" name="description">
    <meta content="Themesdesign" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{env('APP_URL').'/'.ServiceFacade::getData()->with('images')->first()->images->where('type', 'logo')->first()->url ?? ""}}">
    <!-- Layout config Js -->
    <script src="{{asset('panel/assets/js/layout.js')}}"></script>
    <!-- Icons CSS -->

    <!-- Tailwind CSS -->


    <link rel="stylesheet" href="{{asset('panel/assets/css/tailwind2.css')}}">
    @stack('styles')
    @stack('links')
    <style>
        th:after,
        th:before {
            display: none !important;
        }

        .pagination .flex .justify-between,
        .pagination .hidden>div:first-child {
            display: none !important;
        }

        span[aria-current="page"] {
            color: white;
            background-color: #007bff;
            font-weight: bold;
            border: none;
        }

        span[aria-current="page"] span {
            background-color: #007bff;
            border: none;
            color: white;
        }

        .alternativePagination_length {
            width: max-content !important;
        }
    </style>
</head>
