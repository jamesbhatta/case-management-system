@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">VERSP</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">VERSP</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>

        <div class="container-flluid">

            <div class="card z-depth-0 font-noto">
                <div class="card-body">
                    <form action="{{$versp->id? route('versp.update',$versp):route('versp.store') }}" method="POST">
                        @csrf
                        @isset($versp->id)
                            @method('PUT')
                        @endisset
                        <div class="form-group">
                            <label for="input-fiscal-year-end">मिति</label>
                            <input type="text" name="date" id="input-fiscal-year-end"
                                class="form-control fiscal-year-date py-4" value="{{ old('date', $versp->date) }}"
                                placeholder="Nepali YYYY-MM-DD">
                        </div>
                        <div class="col-lg-12 form-group ">
                            <label>किसिम</label>
                            <div class="row border p-3" style="height: 50px">
                                <div class="form-check mx-3">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'जन्म दर्ता') checked @endif value="जन्म दर्ता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        जन्म दर्ता
                                    </label>
                                </div>


                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'मृत्यु दर्ता') checked @endif value="मृत्यु दर्ता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        मृत्यु दर्ता
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'बसाई सराई दर्ता') checked @endif value="बसाई सराई दर्ता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        बसाई सराई दर्ता
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'विवाह दर्ता') checked @endif value="विवाह दर्ता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        विवाह दर्ता
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'सम्बन्ध बिछेद दर्ता') checked @endif value="सम्बन्ध बिछेद दर्ता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सम्बन्ध बिछेद दर्ता
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'नागरिकता') checked @endif value="नागरिकता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        नागरिकता
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox" name="type" type="checkbox"
                                        @if ($versp->type == 'अन्य') checked @endif value="अन्य"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        अन्य
                                    </label>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12 form-group ">
                            <label>संस्था बारे जानकारी? </label>
                            <div class="row border p-3" style="height: 50px">
                                <div class="form-check mx-3">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'सिफारिश') checked @endif value="सिफारिश"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सिफारिश
                                    </label>
                                </div>


                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'पत्रपत्रिका') checked @endif value="पत्रपत्रिका"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        पत्रपत्रिका
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'रेडियो') checked @endif value="रेडियो"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        रेडियो
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'साथीभाई/नातेदार') checked @endif value="साथीभाई/नातेदार"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        साथीभाई/नातेदार
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'वेबसाइट') checked @endif value="वेबसाइट"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        वेबसाइट
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'कार्यक्रम') checked @endif value="कार्यक्रम"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        कार्यक्रम
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'टिभी') checked @endif value="टिभी"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        टिभी
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'सामाजिक संजाल') checked @endif value="सामाजिक संजाल"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सामाजिक संजाल
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input my_checkbox1" name="info" type="checkbox"
                                        @if ($versp->info == 'अन्य') checked @endif value="अन्य"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        अन्य
                                    </label>
                                </div>



                            </div>
                        </div>
                        <input type="submit" class="btn btn-info">

                    </form>
                </div>
            </div>
            {{-- {{$allCases[0]->}} --}}
            <table class="table table-hover table-borderless">
                <h3 class="font-weight-bold" style="margin-top: 50px" id="txt1">VERSP List</h3>
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>मिति</th>
                        <th>किसिम</th>
                        <th> संस्था बारे जानकारी? </th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @forelse($versps as $key=> $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->info }}</td>
                            <td>
                                <a class="action-btn text-success px-2"
                                    href="{{ route('partydetail.index', $item) }}"><i class="fa fa-user"></i></a>
                                <a class="action-btn text-primary" href="{{ route('versp.edit', $item) }}"><i
                                        class="far fa-edit"></i></a>
                                <form action="{{ route('versp.destroy', $item) }}" method="post"
                                    onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="action-btn text-danger"><i
                                            class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white">
                            <td colspan="42" class="text-center">No Records Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })
    </script>
@endpush

@push('scripts')
    <script>
        $('.my_checkbox').on('change', function() {
            $('.my_checkbox').not(this).prop('checked', false);
        });

        $('.my_checkbox1').on('change', function() {
            $('.my_checkbox1').not(this).prop('checked', false);
        });
    </script>
@endpush
