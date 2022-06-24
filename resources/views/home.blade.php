@extends('layouts.app')

@push('styles')
    <style>
        #dashboard {
            min-height: 100vh;
            padding: 1rem;
        }

        a.bg-white {
            color: #1f2d3d !important;
        }
    </style>
@endpush

@section('content')
    <div id="dashboard" class="m-n3">
        <div class="container-fluid font-noto">
            <div class="row">
                {{-- Alerts --}}
                <div class="col-md-12 mt-2">
                    @include('alerts.all')
                </div>

                @can('user.*')
                    <div class="col-12">

                        <x-dashboard-count-tile :link="route('user.index')">
                            <x-slot name="count">{{ $totalUsersCount }}</x-slot>
                            <x-slot name="title">प्रयोगकर्ताहरू</x-slot>
                            <x-slot name="totalEntry">{{ $casesInThisMonth->count() }}</x-slot>
                            <x-slot name="totalCases">{{ $totalCases->count() }}</x-slot>

                        </x-dashboard-count-tile>

                    </div>
                    <div style="width: 100vw;height:50vh">
                        <canvas id="myChart" width="400" height="100"></canvas>
                    </div>
                @endcan
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
       
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['नागरिकता', 'व्यक्तिगत घटना', 'मानव बेचबिखन', 'यौनजन्य हिंसा', 'लैंगिक हिंसा',
                    'घरेलु हिंसा', 'सम्पत्ति', 'रिट', 'सम्बन्ध विच्छेद', 'न्यायिक पुनरावलोकन', 'अन्य'
                ],
                datasets: [{
                    label: 'मुद्दाको किसिम',
                    data: <?php echo json_encode($datas) ?>,
                    backgroundColor: 
                    [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)',

                        'rgba(255, 159, 100, 0.2)',
                        'rgba(20, 300, 180, 0.2)',
                        'rgba(20, 100, 300, 0.2)',
                        'rgba(200, 50, 150, 0.2)',
                        'rgba(160, 350, 150, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',

                        'rgba(255, 159, 100, 1)',
                        'rgba(20, 300, 180, 1)',
                        'rgba(20, 100, 300, 1)',
                        'rgba(200, 50, 150, 1)',
                        'rgba(160, 350, 150, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
    <!-- Chartisan -->
    <script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

    <script src="{{ asset('assets/table2excel/dist/jquery.table2excel.js') }}"></script>
    <script>
        $(function() {
            $("#js-export-business-by-type-table-btn").click(function(e) {
                var table = $('#js-business-by-type-table');
                if (table && table.length) {
                    var preserveColors = (table.hasClass('table2excel_with_colors') ? true : false);
                    $(table).table2excel({
                        exclude: ".noExl",
                        name: "Business By Type",
                        filename: "business-by-type-" + new Date().toISOString().replace(
                            /[\-\:\.]/g, "") + ".xls",
                        fileext: ".xls",
                        exclude_img: true,
                        exclude_links: true,
                        exclude_inputs: true,
                        preserveColors: preserveColors
                    });
                }
            });

        });
    </script>
@endpush
