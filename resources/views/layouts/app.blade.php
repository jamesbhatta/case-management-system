<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @isset($title)
            {{ $title }} |
        {{-- @endisset {{ config('app.name', __('appname')) }} --}}
        @endisset Case Management System
    </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .bs-example {
            margin: 20px;
        }
    </style>

    @include('layouts.partials.styles')
    @stack('styles')




</head>

<body class="sidebar-opened">
    <div id="app">
        @guest
            @yield('content')
        @endguest

        @auth
            <div id="sidebar" class="bg-deep-blue" data-collapsed="false">
                <x-sidebar></x-sidebar>
            </div>
            <div id="content-area" class="flex-grow-1">
                <x-navbar></x-navbar>
                <div class="p-3">
                    @yield('content')
                </div>
            </div>
        @endauth

    </div>
    @include('layouts.partials.scripts')

    <script>
        /**
         * Toggle the sidebar
         * @param null
         **/
        function toggleSidebar() {
            document.getElementsByTagName('body')[0].classList.toggle('sidebar-opened')
        }

        /**
         * Toggle the sidebar with keyboard
         * Key combination: Ctrl + Shift + S
         */
        document.onkeydown = function(e) {
            if (e.ctrlKey && e.shiftKey && e.keyCode === 83) {
                toggleSidebar();
            }
        };

        /**
         * Search dropdown options
         * @param searchTerm
         * @param targets
         * @param dataKey as data-keys
         * @usage filterOptions(10, '#select-district-id option', 'province-id');
         */
        function filterOptions(searchTerm, targets, dataKey) {
            // console.log('Filtering with data-key: ' + dataKey + ' search term: '+ searchTerm);
            $(targets).each(function() {
                if ($(this).data(dataKey) == searchTerm) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        }

        $(function() {
            $('[data-toggle="tooltip"]').tooltip();

            if ($('.nepali-date')[0]) {
                $('.nepali-date').nepaliDatePicker({
                    ndpYear: true,
                    ndpMonth: true,
                    ndpYearCount: 200
                });
            }

            var today = NepaliFunctions.ConvertDateFormat(NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD'),
                'YYYY-MM-DD');
            $(".date-today[value='']").val(today);

        });
    </script>
    @stack('scripts')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    

    $('a[data-toggle="tab"]').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab", function(e) {
        var id = $(e.target).attr("href");
        localStorage.setItem('selectedTab', id)
    });

    var selectedTab = localStorage.getItem('selectedTab');
    if (selectedTab != null) {
        $('a[data-toggle="tab"][href="' + selectedTab + '"]').tab('show');
    }
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        
</script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</html>
