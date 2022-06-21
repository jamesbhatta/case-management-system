@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">व्यक्तिगत विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">VERSP</li>
                <li class="breadcrumb-item active" aria-current="page">व्यक्तिगत विवरण</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>

        <div class="container-flluid">
            <a href="{{route('personal-detail.create',$versp)}}" class="btn btn-info float-right mx-5">Add</a>
            
            {{-- {{$allCases[0]->}} --}}
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">नाम</th>
                        <th scope="col">जन्म मिति </th>
                        <th scope="col">लिङ्ग</th>
                        <th>जिल्ला </th>
                        <th>नगरपालिका/गाउपालिका </th>
                        <th>वडा नम्बर </th>
                        <th>जाति</th>
                        <th>धर्म</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personalDetails as $item)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                            <td>{{ $item->dob }}</td>
                            <td>{{ $item->gender }}</td>
                            <td>{{ $item->district }}</td>
                            <td>{{ $item->municipality }}</td>
                            <td>{{ $item->ward }}</td>
                            <td>{{ $item->cast }}</td>
                            <td>{{ $item->religion }}</td>
                            <td> 
                                 <a class="action-btn text-success px-2" href=""><i
                                class="fa fa-eye"></i></a> 
                                <a class="action-btn text-primary"
                                    href="{{ route('personal-detail.edit', $item) }}"><i
                                        class="far fa-edit"></i></a>
                                <form action="{{ route('personal-detail.destroy', $item) }}"
                                    method="post"
                                    onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                    class="form-inline d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="action-btn text-danger"><i
                                            class="far fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
        
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
