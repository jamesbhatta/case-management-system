    @extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख व्यवस्थापन</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">मुद्दा अभिलेख</li>
                <li class="breadcrumb-item active" aria-current="page">व्यवस्थापन</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>

        <div class="container-flluid">

            <div class="d-flex bg-white p-2">
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle z-depth-0 date-filter" type="button"
                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">Filter by Date
                        &nbsp;</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <form action="{{ route('cases.dateFilter') }}" method="POST" class="p-2">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="start" class="form-control fiscal-year-date my-2"
                                    placeholder="From (YYYY-MM-DD)">
                                <input type="text" name="end" class="form-control fiscal-year-date"
                                    placeholder="To (YYYY-MM-DD)">
                            </div>
                            <button type="submit" class="btn btn-success btn-block z-depth-0">Filter</button>
                        </form>
                    </div>
                </div>
                <form action="{{ route('cases.search') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="input-group data-search">
                        <input type="text" class="form-control rounded-0 " name="search" placeholder="Search"
                            aria-label="Search" aria-describedby="input-group-right">
                        <button type="submit" class="input-group-text rounded-0"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <a href="{{ route('cases.index') }}" class="btn btn-danger z-depth-0"><i class="fa fa-times"></i></a>
                <div class="ml-auto">
                    <a href="{{ route('cases.create') }}" class="btn btn-primary z-depth-0"> <i
                            class="fa fa-plus mr-2"></i>Add</a>
                   
                
                </div>
            </div>
            <div class="card z-depth-0 font-noto overflow-auto">
                <table class="table table-hover table-borderless">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">मुद्दा नं. </th>
                            <th scope="col">मिति</th>
                            <th>मुद्दाको स्थिति</th>
                            <th>पक्षको नाम </th>
                            <th>विपक्षको नाम </th>
                            <th>पक्ष र विपक्ष बिचको सम्बन्ध</th>
                            <th>वारिस</th>
                            <th>मुद्दको किसिम</th>
                            <th>Date Added</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($allCases as $key=> $item)
                            <tr>
                                <td>{{$loop->remaining+1 }}</td>
                                <td>{{ $item->case_number }}</td>
                                <td>{{ $item->date }}</td>
                                <td>{{ $item->case_status }}</td>

                                @if ($item->partyDetail->count() > 0)
                                    @foreach ($item->partyDetail as $item1)
                                        <td>{{ $item1->first_name }} {{ $item1->middle_name }}
                                            {{ $item1->last_name }}
                                        </td>
                                    @break
                                @endforeach
                            @else
                                <td></td>
                            @endif

                            @if ($item->oppositParty->count() > 0)
                                @foreach ($item->oppositParty as $item1)
                                    <td>{{ $item1->first_name }} {{ $item1->middle_name }}
                                        {{ $item1->last_name }}
                                    </td>
                                @break
                            @endforeach
                        @else
                            <td></td>
                        @endif

                        @if ($item->informToParty->count() > 0)
                            @foreach ($item->informToParty as $item1)
                                <td>{{ $item1->relation }}</td>
                                <td>{{ $item1->heir_name }}</td>
                            @break
                        @endforeach
                    @else
                        <td></td>
                        <td></td>
                    @endif

                    @if ($item->caseType->count() > 0)
                        @foreach ($item->caseType as $item1)
                            <td>{{ $item1->case_type }}</td>
                        @break
                    @endforeach
                @else
                    <td></td>
                @endif
                <td>{{ $item->created_at }}</td>
                <td>
                    <a class="action-btn text-success px-2"
                        href="{{ route('partydetail.index', $item) }}"><i class="fa fa-eye"></i></a>
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
{{ $allCases->links('pagination::bootstrap-4') }}
{{-- ================== --}}
<div id="my_data" style="display: none">
    <table border="1" style="border: 1px solid #f5f5f5; border-collapse: collapse;">
        <caption>
            <label class="h2" style="font-size:25pp; font-weight:bold">DALIT WOMEN RIGHT FORUM (DWRF)
                NEPAL</label>
            <h4 class="h4" style="font-size:20pp;">Dhangadhi, Estd 2064</h4>
            <h5 for="" style="font-weight: normal">मुद्दा अभिलेख</h5>
        </caption>
        <thead class="thead-light my-5">
            <tr>
                <th scope="col">#</th>
                <th scope="col">मुद्दा नं. </th>
                <th scope="col">मिति</th>
                <th>मुद्दाको स्थिति</th>
                <th>पक्षको नाम </th>
                <th>विपक्षको नाम </th>
                <th>पक्ष र विपक्ष बिचको सम्बन्ध</th>
                <th>वारिस</th>
                <th>मुद्दको किसिम</th>
                <th>Date Added</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allCases as $key => $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->case_number }}</td>
                    <td>{{ $item->date }}</td>
                    <td>{{ $item->case_status }}</td>

                    @if ($item->partyDetail->count() > 0)
                        @foreach ($item->partyDetail as $item1)
                            <td>{{ $item1->first_name }} {{ $item1->middle_name }}
                                {{ $item1->last_name }}
                            </td>
                        @break
                    @endforeach
                @else
                    <td></td>
                @endif

                @if ($item->oppositParty->count() > 0)
                    @foreach ($item->oppositParty as $item1)
                        <td>{{ $item1->first_name }} {{ $item1->middle_name }}
                            {{ $item1->last_name }}
                        </td>
                    @break
                @endforeach
            @else
                <td></td>
            @endif

            @if ($item->informToParty->count() > 0)
                @foreach ($item->informToParty as $item1)
                    <td>{{ $item1->relation }}</td>
                    <td>{{ $item1->heir_name }}</td>
                @break
            @endforeach
        @else
            <td></td>
            <td></td>
        @endif

        @if ($item->caseType->count() > 0)
            @foreach ($item->caseType as $item1)
                <td>{{ $item1->case_type }}</td>
            @break
        @endforeach
    @else
        <td></td>
    @endif
    <td>{{ $item->created_at }}</td>
</tr>
@endforeach

</tbody>
</table>
</div>
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

    function report_print() {

        document.getElementById("my_data").style.display = "block";
        var prtContent = document.getElementById("my_data");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();

        document.getElementById("my_data").style.display = "none";
    }
</script>
@endpush
