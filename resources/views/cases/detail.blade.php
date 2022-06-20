@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख व्यवस्थापन</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">मुद्दा अभिलेख व्यवस्थापन</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>


        <div>
            <div class="card z-depth-0">
                <div class="card-header" style="overflow: scroll;scrollbar-width: none;">
                    <div style="width: 2220px">
                        <ul class="my-list">
                            <li>
                                <a href="{{route('partydetail.index',$cases)}}">पक्षको विवरण</a>
                            </li>
                            <li>
                                <a href="{{route('opposit-party.index',$cases)}}">विपक्षको विवरण</a>
                            </li>
                            <li>
                                <a href="{{route('inform-to-party.index',$cases)}}">पक्षलाई जानकारी</a>
                            </li>
                            <li>
                                <a href="">वारिस</a>
                            </li>
                            <li>
                                <a href="{{route('case-type.index',$cases)}}">मुद्दाको किसिम</a>
                            </li>
                            <li>
                                <a href="">कानूनी सेवा</a>
                            </li>
                            <li>
                                <a href="{{route('consultation.index',$cases)}}">परामर्श</a>
                            </li>
                            <li>
                                <a href="{{route('facilation.index',$cases)}}">सहजीकरण</a>
                            </li>
                            <li>
                                <a href="{{route('draft.index',$cases)}}">मस्यौदा</a>
                            </li>
                            <li>
                                <a href="{{route('debate.index',$cases)}}">बहस</a>
                            </li>
                            <li>
                                <a href="{{route('reconcilation.index',$cases)}}">मेलमिलाप</a>
                            </li>
                            <li>
                                <a href="{{route('judgement.index',$cases)}}">फैसला कार्यान्वयन</a>
                            </li>
                            <li>
                                <a href="{{route('police-station.index',$cases)}}">प्रहरी कार्यालय</a>
                            </li>
                            <li>
                                <a href="">जिल्ला अदालत</a>
                            </li>
                            <li>
                                <a href="">उच्च अदालत</a>
                            </li>
                            <li>
                                <a href="">सर्वोच्च अदालत</a>
                            </li>
                            <li>
                                <a href="">अन्य अदालत</a>
                            </li>
                            <li>
                                <a href="">स्थानीय तह</a>
                            </li>
                            <li>
                                <a href="">निर्णय भइसकेको</a>
                            </li>
                            <li>
                                <a href="">अस्वीकार गरिएको</a>
                            </li>
                        </ul>
                        {{-- <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-party-detail" aria-selected="true">पक्षको विवरण</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-opposit-party-detail"
                                role="tab" aria-controls="nav-opposit-party-detail" aria-selected="false">विपक्षको विवरण
                            </a>
                            <a class="nav-link" id="nav-pax-lai-jankari" data-toggle="tab" href="#nav-party-information"
                                role="tab" aria-controls="nav-profile" aria-selected="false"> पक्षलाई जानकारी</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-heir" role="tab"
                                aria-controls="nav-profile" aria-selected="false">वारिस</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-case-type" role="tab"
                                aria-controls="nav-profile" aria-selected="false"> मुद्दाको किसिम</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-legal-service"
                                role="tab" aria-controls="nav-profile" aria-selected="false">कानूनी सेवा</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-consultation"
                                role="tab" aria-controls="nav-profile" aria-selected="false">परामर्श</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-facilitation"
                                role="tab" aria-controls="nav-profile" aria-selected="false">सहजीकरण</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-draft" role="tab"
                                aria-controls="nav-profile" aria-selected="false">मस्यौदा</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-debate" role="tab"
                                aria-controls="nav-profile" aria-selected="false">बहस</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-reconciliation"
                                role="tab" aria-controls="nav-profile" aria-selected="false">मेलमिलाप</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-judgment-implementation"
                                role="tab" aria-controls="nav-profile" aria-selected="false">फैसला कार्यान्वयन</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-police-office"
                                role="tab" aria-controls="nav-profile" aria-selected="false">प्रहरी कार्यालय</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-district-court"
                                role="tab" aria-controls="nav-profile" aria-selected="false">जिल्ला अदालत</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-high-court"
                                role="tab" aria-controls="nav-profile" aria-selected="false">उच्च अदालत</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-supreme-court"
                                role="tab" aria-controls="nav-profile" aria-selected="false">सर्वोच्च अदालत</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-other-courts"
                                role="tab" aria-controls="nav-profile" aria-selected="false">अन्य अदालत</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-local-level"
                                role="tab" aria-controls="nav-profile" aria-selected="false">स्थानीय तह</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-discussion-made"
                                role="tab" aria-controls="nav-profile" aria-selected="false">निर्णय भइसकेको</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-rejected"
                                role="tab" aria-controls="nav-profile" aria-selected="false">अस्वीकार गरिएको</a>
                        </nav> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            {{-- =================पक्षको विवरण=================== --}}
            @yield('caseContent')
            {{-- ===============विपक्षको विवरण ================= --}}
            <div class="tab-pane fade" id="nav-opposit-party-detail" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="card z-depth-0">
                    <div class="card-body">
                        <div class="my-4">

                            <col-12>
                                {{-- <a class="float-right  btn btn-info" --}}
                                    {{-- href="{{ route('opposit-party.index', $cases) }}">Add</a> --}}
                            </col-12>
                            <table class="table">
                                {{-- <thead class="thead-light">
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
                                </thead> --}}
                                <tbody>
                                    {{-- @foreach ($oppositParties as $oppositpariy) --}}
                                        {{-- <tr>
                                            <td>{{ $oppositpariy->cases_id }}</td>
                                            <td>{{ $oppositpariy->first_name }} {{ $oppositpariy->last_name }}</td>
                                            <td>{{ $oppositpariy->dob }}</td>
                                            <td>{{ $oppositpariy->gender }}</td>
                                            <td>{{ $oppositpariy->district }}</td>
                                            <td>{{ $oppositpariy->municipality }}</td>
                                            <td>{{ $oppositpariy->ward }}</td>
                                            <td>{{ $oppositpariy->cast }}</td>
                                            <td>{{ $oppositpariy->religion }}</td>
                                            <td> --}}
                                                {{-- <a class="action-btn text-success px-2" href="{{ route('cases.view', $item) }}"><i
                                                class="fa fa-eye"></i></a> --}}
                                                {{-- <a class="action-btn text-primary"
                                                    href="{{ route('opposit-party.edit', $oppositpariy) }}"><i
                                                        class="far fa-edit"></i></a>
                                                <form action="{{ route('opposit-party.destroy', $oppositpariy) }}"
                                                    method="post"
                                                    onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                                    class="form-inline d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="action-btn text-danger"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </form>
                                            </td> --}}
                                        {{-- </tr> --}}
                                    {{-- @endforeach --}}

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            {{-- ===============पक्षलाई जानकारी================= --}}
            <div class="tab-pane fade" id="nav-party-information" role="tabpanel" aria-labelledby="nav-disabled-tab">Lorem ipsum
                dolor sit amet consectetur, adipisicing elit. Laudantium minima repellat incidunt facilis obcaecati
                blanditiis corrupti ad officia doloribus ullam sapiente ipsum, nemo a, excepturi voluptatem voluptatibus
                velit eum dignissimos ut, nam tempora? Reiciendis illo itaque veritatis eligendi fuga, mollitia ratione
                totam veniam esse in.</div>
        </div>
    </div>
@endsection
