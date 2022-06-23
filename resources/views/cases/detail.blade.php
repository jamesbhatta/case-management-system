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
        <div class=" bg-white rounded border font-noto">
            <ul class="my-list">
                <li>
                    <a href="{{route('partydetail.index',$cases)}}" class="{{ setActive('partydetail.*') }}">पक्षको विवरण</a>
                </li>
                <li>
                    <a href="{{route('opposit-party.index',$cases)}}" class="{{ setActive('opposit-party.*') }}">विपक्षको विवरण</a>
                </li>
                <li>
                    <a href="{{route('inform-to-party.index',$cases)}}" class="{{ setActive('inform-to-party.*') }}">पक्षलाई जानकारी</a>
                </li>
                <li>
                    <a href="">वारिस</a>
                </li>
                <li>
                    <a href="{{route('case-type.index',$cases)}}" class="{{ setActive('case-type.*') }}">मुद्दाको किसिम</a>
                </li>
                <li>
                    <a href="">कानूनी सेवा</a>
                </li>
                <li>
                    <a href="{{route('consultation.index',$cases)}}" class="{{ setActive('consultation.*') }}">परामर्श</a>
                </li>
                <li>
                    <a href="{{route('facilation.index',$cases)}}" class="{{ setActive('facilation.*') }}">सहजीकरण</a>
                </li>
                <li>
                    <a href="{{route('draft.index',$cases)}}" class="{{ setActive('draft.*') }}">मस्यौदा</a>
                </li>
                <li>
                    <a href="{{route('debate.index',$cases)}}" class="{{ setActive('debate.*') }}">बहस</a>
                </li>
                <li>
                    <a href="{{route('reconcilation.index',$cases)}}" class="{{ setActive('reconcilation.*') }}">मेलमिलाप</a>
                </li>
                <li>
                    <a href="{{route('judgement.index',$cases)}}" class="{{ setActive('judgement.*') }}">फैसला कार्यान्वयन</a>
                </li>
                <li>
                    <a href="{{route('police-station.index',$cases)}}" class="{{ setActive('police-station.*') }}">प्रहरी कार्यालय</a>
                </li>
                <li>
                    <a href="{{route('district-court.index',$cases)}}" class="{{ setActive('district-court.*') }}">जिल्ला अदालत</a>
                </li>
                <li>
                    <a href="{{route('high-court.index',$cases)}}" class="{{ setActive('high-court.*') }}">उच्च अदालत</a>
                </li>
                <li>
                    <a href="{{route('supreme-court.index',$cases)}}" class="{{ setActive('supreme-court.*') }}">सर्वोच्च अदालत</a>
                </li>
                <li>
                    <a href="{{route('other-court.index',$cases)}}" class="{{ setActive('other-court.*') }}">अन्य अदालत</a>
                </li>
                <li>
                    <a href="{{route('local-level.index',$cases)}}" class="{{ setActive('local-level.*') }}">स्थानीय तह</a>
                </li>
                <li>
                    <a href="{{route('decision.index',$cases)}}" class="{{ setActive('decision.*') }}">निर्णय भइसकेको</a>
                </li>
                <li>
                    <a href="{{route('rejected.index',$cases)}}" class="{{ setActive('rejected.*') }}">अस्वीकार गरिएको</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="tab-content" id="nav-tabContent">

        @yield('caseContent')
        {{-- ===============विपक्षको विवरण ================= --}}

    </div>
</div>
@endsection
