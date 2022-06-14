@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" id="txt2" aria-current="page">मुद्दा अभिलेख</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>




        <div class="card z-depth-0">
            <div class="card-header">
                <div style="overflow: auto;scrollbar-width: none;">
                    <div>
                        <nav class="nav nav-pills" id="pills-tab" role="tablist">
                            <a class="nav-link text-dark active" onclick="btn_clicked('मुद्दा अभिलेख')" id="pills-home-tab" data-bs-toggle="pill" href="#pills-case"
                                role="tab" aria-controls="pills-home" aria-selected="true">मुद्दा अभिलेख</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('पक्षको विवरण')" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-party_details" role="tab" aria-controls="pills-profile"
                                aria-selected="false">पक्षको विवरण</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('विपक्षको विवरण')" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-opposit_party_details" role="tab" aria-controls="pills-profile"
                                aria-selected="false">विपक्षको विवरण</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('वारिस')" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-relations" role="tab" aria-controls="pills-profile"
                                aria-selected="false">वारिस</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('मुद्दाको किसिम')" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-case_type" role="tab" aria-controls="pills-profile"
                                aria-selected="false">मुद्दाको किसिम</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('कानूनी सेवा')" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-consultation" role="tab" aria-controls="pills-profile"
                                aria-selected="false">कानूनी सेवा</a>
                            {{-- <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-consultation" role="tab" aria-controls="pills-profile"
                                aria-selected="false">परामर्श</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">सहजीकरण</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">मस्यौदा</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">बहस</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">मेलमिलाप</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">फैसला कार्यान्वयन</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">प्रहरी कार्यालय</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">जिल्ला अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">उच्च अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">सर्वोच्च अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">अन्य अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">स्थानीय तह</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">निर्णय भइसकेको</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">अस्वीकार गरिएको</a> --}}

                        </nav>
                    </div>
                </div>

            </div>


        </div>

        <div class="card z-depth-0">
            <div class="card-body ">


                <div class="tab-content" id="pills-tabContent">
                    {{-- ================================================मुद्दा अभिलेख===================================== --}}
                    <x-case></x-case>

                    {{-- ==============================================पक्षको विवरण विवरण =================================== --}}
                   
                    <x-party_details></x-party_details>
                    {{-- ============================================विपक्षको विवरण============================================= --}}
                  <x-opposit_party_details></x-opposit_party_details>

                    {{-- ======================================पक्ष र विपक्ष बिचको सम्बन्ध/वारिस ========================================= --}}
                  <x-relations></x-relations>

                    {{-- ============================================मुद्दाको किसिम============================================= --}}
                  <x-case_type></x-case_type>
                    {{-- ============================================परामर्श============================================= --}}
                    <x-consultation></x-consultation>
                </div>

            </div>

        </div>


    </div>
@endsection

<script>
    $("document").ready(function() {
        setTimeout(function() {
            $(".alert").remove();
        }, 1000); // 3 secs

    }); 
    function btn_clicked(text) {
        document.getElementById("txt1").innerHTML=text;
        document.getElementById("txt2").innerHTML=text;
        // ("helloo");
    }
    
</script>
