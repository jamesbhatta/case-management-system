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


        <div>
            <div class="card z-depth-0">
                <div class="card-header" style="overflow: scroll;scrollbar-width: none;">
                    <div style="width: 2300px">
                        <nav class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                aria-controls="nav-party-detail" aria-selected="true">पक्षको विवरण</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-opposit-party-detail" role="tab" aria-controls="nav-opposit-party-detail"
                                aria-selected="false">विपक्षको विवरण </a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-party-information"
                                role="tab" aria-controls="nav-profile" aria-selected="false"> पक्षलाई जानकारी</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-heir" role="tab"
                                aria-controls="nav-profile" aria-selected="false">वारिस</a>
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-case-type"
                                role="tab" aria-controls="nav-profile" aria-selected="false"> मुद्दाको किसिम</a>
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
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab"
                                href="#nav-judgment-implementation" role="tab" aria-controls="nav-profile"
                                aria-selected="false">फैसला कार्यान्वयन</a>
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
                            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-rejected" role="tab"
                                aria-controls="nav-profile" aria-selected="false">अस्वीकार गरिएको</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                {{-- <x-party_details></x-party_details> --}}
                <div class="card z-depth-0">
                    <div class="card-body">
                        <div class="my-4">

                            <col-12>
                                <a class="float-right  btn btn-info" href="{{ route('partydetail.create', $cases) }}">Add</a>
                            </col-12>
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
                                    @foreach ($partyDetails as $item)
                                        <tr>
                                            <td>{{ $item->cases_id }}</td>
                                            <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                            <td>{{ $item->dob }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <td>{{ $item->district }}</td>
                                            <td>{{ $item->municipality }}</td>
                                            <td>{{ $item->ward }}</td>
                                            <td>{{ $item->cast }}</td>
                                            <td>{{ $item->religion }}</td>
                                            <td>
                                                {{-- <a class="action-btn text-success px-2" href="{{ route('cases.view', $item) }}"><i
                                                    class="fa fa-eye"></i></a> --}}
                                                <a class="action-btn text-primary" href="{{ route('partydetail.edit', $item) }}"><i
                                                        class="far fa-edit"></i></a>
                                                <form action="{{ route('partydetail.destroy', $item) }}" method="post"
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
            </div>
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Lorem ipsum dolor
                sit amet, consectetur adipisicing elit. Magni, natus sed soluta necessitatibus tempore aspernatur?
                Praesentium, odit explicabo distinctio dolore adipisci officia iure, ut magnam optio aliquam at similique
                veritatis.</div>
            <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab">Lorem ipsum
                dolor sit amet consectetur, adipisicing elit. Laudantium minima repellat incidunt facilis obcaecati
                blanditiis corrupti ad officia doloribus ullam sapiente ipsum, nemo a, excepturi voluptatem voluptatibus
                velit eum dignissimos ut, nam tempora? Reiciendis illo itaque veritatis eligendi fuga, mollitia ratione
                totam veniam esse in.</div>
        </div>
    </div>
@endsection
