@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3">मुद्दा अभिलेख</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">मुद्दा अभिलेख</li>
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
                            <a class="nav-link text-dark active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-case"
                                role="tab" aria-controls="pills-home" aria-selected="true">मुद्दा अभिलेख</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-party_details" role="tab" aria-controls="pills-profile"
                                aria-selected="false">पक्षको विवरण</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-opposit_party_details" role="tab" aria-controls="pills-profile"
                                aria-selected="false">विपक्षको विवरण</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-relations" role="tab" aria-controls="pills-profile"
                                aria-selected="false">वारिस</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-case_type" role="tab" aria-controls="pills-profile"
                                aria-selected="false">मुद्दाको किसिम</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
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
                    <div class="tab-pane fade show active" id="pills-case" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($organization->id)
                                @method('put')
                                <input type="hidden" name="id" value="{{ $organization->id }}" hidden>
                            @endisset

                            <div class="row">
                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">*क्रम संख्या</label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                    <x-invalid-feedback field="name"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">*मुद्दा नं. </label>
                                    <select name="type" class="custom-select">
                                        <option value="headquarter">Headquarter</option>
                                        <option value="division">Division</option>
                                        <option value="sub-division">Sub Division</option>
                                    </select>
                                    <x-invalid-feedback field="type"></x-invalid-feedback>
                                </div>



                                <div class="col-md-3   form-group">
                                    <label for="">*मिति</label>
                                    <input type="text" name="address"
                                        class="form-control rounded-0 {{ invalid_class('address') }}"
                                        value="{{ old('address', $organization->address ?? '') }}">
                                    <x-invalid-feedback field="address"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for="">*मुद्दाको स्थिति</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>


                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- ==============================================पक्षको विवरण विवरण =================================== --}}
                    <div class="tab-pane fade" id="pills-party_details" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf

                            @isset($organization->id)
                                @method('put')
                                <input type="hidden" name="id" value="{{ $organization->id }}" hidden>
                            @endisset

                            <div class="row">
                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">पहिलो नाम</label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                    <x-invalid-feedback field="name"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">बीचको नाम</label>
                                    <select name="type" class="custom-select">
                                        <option value="headquarter">Headquarter</option>
                                        <option value="division">Division</option>
                                        <option value="sub-division">Sub Division</option>
                                    </select>
                                    <x-invalid-feedback field="type"></x-invalid-feedback>
                                </div>



                                <div class="col-md-3   form-group">
                                    <label for="">थर</label>
                                    <input type="text" name="address"
                                        class="form-control rounded-0 {{ invalid_class('address') }}"
                                        value="{{ old('address', $organization->address ?? '') }}">
                                    <x-invalid-feedback field="address"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for="">जन्म मिति </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> उमेर</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> लिङ्ग</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> वैवाहिक अवस्था</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> जिल्ला </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> नगरपालिका/गाउपालिका </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> वडा नम्बर </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> सम्पर्क नम्बर </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> इमेल</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> जाति</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> धर्म</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> शिक्षा</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> अपाङ्गताको अवस्था</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> परिवारका सदस्यको सङ्ख्या</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for="">परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>



                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- ============================================विपक्षको विवरण============================================= --}}
                    <div class="tab-pane fade" id="pills-opposit_party_details" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">पहिलो नाम</label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                    <x-invalid-feedback field="name"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">बीचको नाम</label>
                                    <select name="type" class="custom-select">
                                        <option value="headquarter">Headquarter</option>
                                        <option value="division">Division</option>
                                        <option value="sub-division">Sub Division</option>
                                    </select>
                                    <x-invalid-feedback field="type"></x-invalid-feedback>
                                </div>



                                <div class="col-md-3   form-group">
                                    <label for="">थर</label>
                                    <input type="text" name="address"
                                        class="form-control rounded-0 {{ invalid_class('address') }}"
                                        value="{{ old('address', $organization->address ?? '') }}">
                                    <x-invalid-feedback field="address"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for="">जन्म मिति </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> उमेर</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> लिङ्ग</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> वैवाहिक अवस्था</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> जिल्ला </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> नगरपालिका/गाउपालिका </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> वडा नम्बर </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> सम्पर्क नम्बर </label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> इमेल</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>
                                <div class="col-md-3   form-group">
                                    <label for=""> जाति</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> धर्म</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> शिक्षा</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> अपाङ्गताको अवस्था</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for=""> परिवारका सदस्यको सङ्ख्या</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3   form-group">
                                    <label for="">परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
                                    <input type="text" name="phone"
                                        class="form-control rounded-0 {{ invalid_class('phone') }}"
                                        value="{{ old('phone', $organization->phone ?? '') }}">
                                    <x-invalid-feedback field="phone"></x-invalid-feedback>
                                </div>



                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- ======================================पक्ष र विपक्ष बिचको सम्बन्ध/वारिस ========================================= --}}
                    <div class="tab-pane fade" id="pills-relations" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row">
                                <div class="col-md-12 form-group  ">
                                    <label for="" class="required">पक्ष र विपक्ष बिचको सम्बन्ध </label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                    <x-invalid-feedback field="name"></x-invalid-feedback>
                                </div>

                                <div class="col-md-12 form-group  ">
                                    <hr>
                                    <label for="" class="required"> पक्षलाई जानकारी?</label>
                                    <hr>
                                    <div class="row">
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="सिफारिश"
                                                id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">सिफारिश</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">पत्रपत्रिका</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">रेडियो </label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">साथीभाई/नातेदार</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">वेबसाइट</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">कार्यक्रम</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">टिभी</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">सामाजिक संजाल</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">अन्य</label>
                                        </div>


                                    </div>
                                </div>

                                <div class="col-md-12 form-group  ">
                                    <hr>
                                    <label for="" class="required"> वारिस</label>
                                    <hr>
                                    <div class="row">
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="सिफारिश"
                                                id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">स्वयम</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">स्व नियुक्ति</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">BWAN</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">अन्य</label>
                                        </div>

                                    </div>
                                </div>


                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- ============================================मुद्दाको किसिम============================================= --}}
                    <div class="tab-pane fade" id="pills-case_type" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 form-group  ">
                                    <label for="" class="required">मुद्दाको किसिम</label>
                                    <hr>
                                    <div class="row">
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="सिफारिश"
                                                id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">नागरिकता</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">व्यक्तिगत घटना</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">मानव बेचबिखन</label>
                                        </div>
                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">यौनजन्य हिंसा</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">लैंगिक हिंसा</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">घरेलु हिंसा</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">सम्पत्ति</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">रिट</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">सम्बन्ध विच्छेद</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                                            <label class="form-check-label" for="formCheckDefault">न्यायिक
                                                पुनरावलोकन</label>
                                        </div>

                                        <div class="form-check mx-3">
                                            <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">

                                            <label class="form-check-label" for="formCheckDefault">अन्य</label>
                                        </div>

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    {{-- ============================================परामर्श============================================= --}}
                    <div class="tab-pane fade" id="pills-consultation" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="alert alert-primary" role="alert">
                            <h4 class="text-center">कानूनी सेवा</h4>
                        </div>
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 form-group  ">
                                    <label for="" class="required">मिति</label>
                                    <input type="date" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>
                                <div class="col-md-4 form-group  ">
                                    <label for="" class="required">अन्यन्त्र सिफारिश </label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>
                                <div class="col-md-4 form-group  ">
                                    <label for="" class="required">सेवा प्रकार</label>
                                   <select name="" id="" class="form-control">
                                    <option value="" disabled selected>सेवा प्रकार चयन गर्नुहोस्</option>
                                    <option value="परामर्श">परामर्श</option>
                                    <option value="सहजीकरण">सहजीकरण</option>
                                    <option value="मस्यौदा">मस्यौदा</option>
                                    <option value="बहस">बहस</option>
                                    <option value="मेलमिलाप">मेलमिलाप</option>
                                    <option value="">फैसला कार्यान्वयन</option>
                                    <option value="">प्रहरी कार्यालय</option>
                                    <option value="">जिल्ला अदालत</option>
                                    <option value="">उच्च अदालत</option>
                                    <option value="">सर्वोच्च अदालत</option>
                                    <option value="">अन्य अदालत</option>
                                    <option value="">स्थानीय तह</option>
                                    <option value="">निर्णय भइसकेको</option>
                                    <option value="">अस्वीकार गरिएको</option>
                                    
                                   </select>
                                </div>
                                <div class="col-md-12 form-group  ">
                                    <label for="" class="required">विवरण</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-6 form-group  ">
                                    <label for="" class="required">सम्बन्धित कागजातहरू</label>
                                    <input type="file" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 form-group  ">
                                    <label for="" class="required">अन्य संलग्न व्यक्तिहरु </label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>

                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

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
</script>
