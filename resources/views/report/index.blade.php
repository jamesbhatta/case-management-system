@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">रिपोर्ट</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">रिपोर्ट</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>

        <div class="container-flluid">

            <div class="d-flex bg-white p-2">
                {{-- <div class="dropdown">
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
                </div> --}}

                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Date Filter
                    </button>
                    <div class="dropdown-menu">
                        <form action="{{ route('report.dateFilter') }}" method="POST" class="p-2">
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



                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        मुद्दाको स्थिति
                    </button>

                    <div class="dropdown-menu">
                        <a href="{{route('status.caseStatus',['key'=>'परामर्श'])}}" class="m-3">परामर्श</a> <br>
                        {{-- <a href="#" class="m-3 p-2" onclick="appendCaseStstus('परामर्श')">परामर्श</a> <br> --}}
                        <a href="{{ route('status.caseStatus', ['key' => 'सहजीकरण']) }}" class="m-3">सहजीकरण</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'मस्यौदा']) }}" class="m-3">मस्यौदा</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'बहस']) }}" class="m-3">बहस</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'मेलमिलाप']) }}" class="m-3">मेलमिलाप</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'फैसला कार्यान्वयन']) }}" class="m-3">फैसला
                            कार्यान्वयन</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'प्रहरी कार्यालय']) }}" class="m-3">प्रहरी
                            कार्यालय</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'जिल्ला अदालत']) }}" class="m-3">जिल्ला
                            अदालत</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'उच्च अदालत']) }}" class="m-3">उच्च अदालत</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'सर्वोच्च अदालत']) }}" class="m-3">सर्वोच्च
                            अदालत</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'अन्य अदालत']) }}" class="m-3">अन्य अदालत</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'स्थानीय तह']) }}" class="m-3">स्थानीय तह</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'निर्णय भइसकेको']) }}" class="m-3">निर्णय
                            भइसकेको</a><br>
                        <a href="{{ route('status.caseStatus', ['key' => 'अस्वीकार गरिएको']) }}" class="m-3">अस्वीकार
                            गरिएको</a><br>
                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        वारिस
                    </button>

                    <div class="dropdown-menu">
                        <a href="{{ route('witness.witness', ['witness' => 'स्वयम']) }}" class="m-3 p-2">स्वयम</a> <br>
                        <a href="{{ route('witness.witness', ['witness' => 'स्व नियुक्ति']) }}" class="m-3 p-2">स्व नियुक्ति
                        </a><br>
                        <a href="{{ route('witness.witness', ['witness' => 'BWAN']) }}" class="m-3 p-2">BWAN</a><br>
                        <a href="{{ route('witness.witness', ['witness' => 'अन्य']) }}" class="m-3 p-2">अन्य</a><br>

                    </div>
                </div>

                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        मुद्दको किसिम
                    </button>

                    <div class="dropdown-menu" style="width: 180px">
                        <a href="{{ route('type.caseType', ['type' => 'नागरिकता']) }}" class="m-3 ">नागरिकता</a> <br>
                        <a href="{{ route('type.caseType', ['type' => 'व्यक्तिगत घटना']) }}" class="m-3">व्यक्तिगत
                            घटना</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'मानव बेचबिखन']) }}" class="m-3">मानव
                            बेचबिखन</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'यौनजन्य हिंसा']) }}" class="m-3">यौनजन्य
                            हिंसा</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'लैंगिक हिंसा']) }}" class="m-3">लैंगिक
                            हिंसा</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'घरेलु हिंसा']) }}" class="m-3">घरेलु
                            हिंसा</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'सम्पत्ति']) }}" class="m-3">सम्पत्ति</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'रिट']) }}" class="m-3">रिट</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'सम्बन्ध विच्छेद']) }}" class="m-3">सम्बन्ध
                            विच्छेद</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'न्यायिक पुनरावलोकन']) }}" class="m-3">न्यायिक
                            पुनरावलोकन</a><br>
                        <a href="{{ route('type.caseType', ['type' => 'अन्य']) }}" class="m-3">अन्य</a><br>

                    </div>
                </div>

                <form action="{{ route('report.search') }}" method="POST" class="form-inline">
                    @csrf
                    <div class="input-group data-search">
                        <input type="text" class="form-control rounded-0 " name="search" placeholder="Search"
                            aria-label="Search" aria-describedby="input-group-right">
                        <button type="submit" class="input-group-text rounded-0"><i class="fa fa-search"></i></button>
                    </div>
                </form>
                <a href="{{ route('report.index') }}" class="btn btn-danger z-depth-0"><i class="fa fa-times"></i></a>
                <div class="ml-auto">
                    {{-- <a href="{{ route('cases.create') }}" class="btn btn-primary z-depth-0"> <i
                            class="fa fa-plus mr-2"></i>Add</a> --}}

                    <button class="btn btn-primary z-depth-0" data-toggle="modal" data-target="#exampleModal">Generate
                        report</button>
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

    </tbody>
</table>
{{-- ================== --}}
{{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true" id="model">
    <div style="width: 80vw;margin-left:10vw;margin-top:10vh">
        <div class="modal-content" style="height: 80vh;">

            <div style="heihtt:80vh; overflow: auto">
                <h2 class="col-12 text-center mt-5 " style="font-size:25pp; font-weight:bold">DALIT WOMEN RIGHT
                    FORUM
                    (DWRF)
                    NEPAL</h2>
                <h4 class="h4 text-center" style="font-size:20pp;">Dhangadhi, Estd 2064</h4>
                <h5 class="text-center" for="" style="font-weight: normal">मुद्दा अभिलेख</h5>
                <table class="table  mt-5">

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
        @empty
            <tr class="bg-white">
                <td colspan="42" class="text-center">No Records Found</td>
            </tr>
        @endforelse

    </tbody>

</table>
</div>
<div class="row m-3">

</div>
</div> --}}

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="position: absolute;width:80vw;">
        <div style="width: 80vw;margin-left:10vw;margin-top:10vh">
            <div class="modal-content" style="height: 80vh;">

                <div style="heihtt:80vh; overflow: auto" id="my_data">
                    <h2 class="mt-5 col-12 text-center" style="font-size:25pp; font-weight:bold">DALIT
                        WOMEN
                        RIGHT FORUM (DWRF) NEPAL</h2>
                    <h4 class="col-12 text-center" style="font-size:20pp;">Dhangadhi, Estd 2064</h4>
                    <h5 class="col-12 text-center" for="" style="font-weight: normal;">मुद्दा अभिलेख</h5>
                    <table class="table  mt-5" border="1"
                        style="border: 1px solid #f5f5f5; border-collapse: collapse;">

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
            @empty
                <tr class="bg-white">
                    <td colspan="42" class="text-center">No Records Found</td>
                </tr>
            @endforelse

        </tbody>

    </table>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button class="btn btn-primary btnPrint" id="btnPrint"
        onclick="report_print()">Print</button>
</div>

</div>


</div>
</div>
</div>
</div>
</div>

<script>
    function report_print() {

        var prtContent = document.getElementById("my_data");
        var WinPrint = window.open();
        WinPrint.document.write(prtContent.outerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

    function appendCaseStstus(status) {
        const url = new URL(window.location.href);
        document.location.search =url.searchParams.append('x','lkj');
        console.log(newUrl.search);
    }
</script>
@endsection

@push('scripts')
<script></script>
<script>
    $(function() {
        if ($('.fiscal-year-date')[0]) {
            $('.fiscal-year-date').nepaliDatePicker({});
        }

    })
</script>
@endpush

<style>
    
    .dropdown-menu a:hover{
        /* color:#000; */
        font-weight:bold;
    }
</style>
