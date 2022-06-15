@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख व्यवस्थापन</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">मुद्दा अभिलेख</li>
                <li class="breadcrumb-item active" aria-current="page">व्यवस्थापन</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>

        <div class="container-flluid">

            <div class="card z-depth-0 font-noto">
                <div class="card-header">
                    <div class="row">

                        <div class="col">
                            <a href="{{ route('cases.create') }}" class="btn btn-info float-right"> <i
                                    class="fa fa-plus"></i> Add</a>
                        </div>
                    </div>
                </div>
                <table class="table table-hover table-borderless">
                    <thead class="thead-light">
                        <tr>
                            {{-- <th scope="col">#</th> --}}
                            <th scope="col">क्रम संख्या</th>
                            <th scope="col">मुद्दा नं. </th>
                            <th scope="col">मिति</th>
                            <th scope="col">मुद्दाको स्थिति</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($allCases as $item)
                            <tr>
                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                <td>{{ $item->serial_number }}</td>
                                <td>{{ $item->case_number }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->case_status }}</td>
                                <td>
                                    <a class="action-btn text-success px-2" href="{{ route('cases.view', $item) }}"><i
                                        class="fa fa-eye"></i></a>
                                    <a class="action-btn text-primary" href="{{ route('cases.edit', $item) }}"><i
                                            class="far fa-edit"></i></a>
                                    <form action="{{ route('cases.destroy', $item) }}" method="post"
                                        onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                        class="form-inline d-inline">
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
