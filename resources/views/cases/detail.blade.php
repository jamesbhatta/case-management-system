@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख व्यवस्थापन</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                
                <li class="breadcrumb-item active" aria-current="page">मुद्दा अभिलेख व्यवस्थापन</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>


        <div>
            <div class="card z-depth-0">
                <div class="card-header" style="overflow-x: scroll;scrollbar-width: none;">
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
                                <a href="{{route('district-court.index',$cases)}}">जिल्ला अदालत</a>
                            </li>
                            <li>
                                <a href="{{route('high-court.index',$cases)}}">उच्च अदालत</a>
                            </li>
                            <li>
                                <a href="{{route('supreme-court.index',$cases)}}">सर्वोच्च अदालत</a>
                            </li>
                            <li>
                                <a href="{{route('other-court.index',$cases)}}">अन्य अदालत</a>
                            </li>
                            <li>
                                <a href="{{route('local-level.index',$cases)}}">स्थानीय तह</a>
                            </li>
                            <li>
                                <a href="{{route('decision.index',$cases)}}">निर्णय भइसकेको</a>
                            </li>
                            <li>
                                <a href="{{route('rejected.index',$cases)}}">अस्वीकार गरिएको</a>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
           
            @yield('caseContent')
            {{-- ===============विपक्षको विवरण ================= --}}
          
        </div>
    </div>
@endsection
