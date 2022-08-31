@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
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
                            <h4> नयाँ मुद्दा अभिलेख थप्नुहोस्</h4>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="card z-depth-0">
            <div class="card-body ">
                <div class="tab-content" id="pills-tabContent">
                    {{-- ================================================मुद्दा अभिलेख===================================== --}}
                    {{-- <x-case></x-case> --}}
                    <div class="tab-pane fade show active" id="pills-case" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form action="{{ $cases->id ? route('cases.update', $cases) : route('cases.store') }} "
                            class="form" method="post">
                            @csrf
                            @isset($cases->id)
                                @method('PUT')
                            @endisset
                            <div class="row">

                                <div class="col-lg-4 col-md-12 form-group  ">
                                    <label for="" class="required">*मुद्दा नं. </label>
                                    <input type="text" name="case_number" class="form-control romanized rounded-0"
                                        value="{{ old('case_number', $cases->case_number) }}">
                                    <x-invalid-feedback field="type"></x-invalid-feedback>
                                </div>

                                <div class="col-lg-4   form-group">
                                    <label for="">*मिति</label>
                                    <input type="text" name="date" id="input-fiscal-year-start"
                                        class="form-control nepali-date" value="{{ old('date', $cases->date) }}"
                                        placeholder="Nepali YYYY-MM-DD">
                                </div>
                                
                                <div class="col-lg-4   form-group">
                                    <label for="">*मुद्दाको स्थिति</label>
                                    <select class="form-control" name="case_status" id="">
                                        @isset($cases->id)
                                            <option value="{{ $cases->case_status }}" selected>{{ $cases->case_status }}
                                            </option>
                                        @else
                                            <option value="" disabled selected>मुद्दाको स्थिति चयन गर्नुहोस्</option>
                                        @endisset
                                        <option value="परामर्श" @if (old('case_status') == 'परामर्श') selected @endif>परामर्श
                                        </option>
                                        <option value="सहजीकरण" @if (old('case_status') == 'सहजीकरण') selected @endif>सहजीकरण
                                        </option>
                                        <option value="मस्यौदा" @if (old('case_status') == 'मस्यौदा') selected @endif>मस्यौदा
                                        </option>
                                        <option value="बहस" @if (old('case_status') == 'बहस') selected @endif>बहस
                                        </option>
                                        <option value="मेलमिलाप" @if (old('case_status') == 'मेलमिलाप') selected @endif>मेलमिलाप
                                        </option>
                                        <option value="फैसला कार्यान्वयन"@if (old('case_status') == 'फैसला कार्यान्वयन') selected @endif>
                                            फैसला कार्यान्वयन</option>
                                        <option value="प्रहरी कार्यालय" @if (old('case_status') == 'प्रहरी कार्यालय') selected @endif>
                                            प्रहरी कार्यालय</option>
                                        <option value="जिल्ला अदालत" @if (old('case_status') == 'जिल्ला अदालत') selected @endif>
                                            जिल्ला अदालत</option>
                                        <option value="उच्च अदालत" @if (old('case_status') == 'उच्च अदालत') selected @endif>उच्च
                                            अदालत</option>
                                        <option value="सर्वोच्च अदालत" @if (old('case_status') == 'सर्वोच्च अदालत') selected @endif>
                                            सर्वोच्च अदालत</option>
                                        <option value="अन्य अदालत" @if (old('case_status') == 'अन्य अदालत') selected @endif>अन्य
                                            अदालत</option>
                                        <option value="स्थानीय तह" @if (old('case_status') == 'स्थानीय तह') selected @endif>
                                            स्थानीय तह</option>
                                        <option value="निर्णय भइसकेको" @if (old('case_status') == 'निर्णय भइसकेको') selected @endif>
                                            निर्णय भइसकेको</option>
                                        <option value="अस्वीकार गरिएको" @if (old('case_status') == 'अस्वीकार गरिएको') selected @endif>
                                            अस्वीकार गरिएको</option>
                                    </select>
                                </div>
                                <div class="col-lg-12 form-group ">

                                    <label>*मुद्दाको किसिम</label>
                                    <div class="container-fluid">
                                        <div class="row border p-3" style="height: auto">
                                            <div class="form-check mx-3">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="नागरिकता" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    नागरिकता
                                                </label>
                                            </div>

                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="व्यक्तिगत घटना" id="biyaktigatGhatna" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                <label class="form-check-label" for="biyaktigatGhatna" data-toggle="modal"
                                                    data-target="#exampleModal">
                                                    व्यक्तिगत घटना
                                                </label>
                                            </div>
                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">व्यक्तिगत
                                                                घटनाहरू</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true"><i
                                                                        class="fa fa-times"></i></span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="col-lg-12 form-group ">

                                                                <div class="row  p-3" style="height: auto">
                                                                    <div class="form-check mx-3">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="जन्म दर्ता" id="birthRegister">
                                                                        <label class="form-check-label"
                                                                            for="birthRegister">
                                                                            जन्म दर्ता
                                                                        </label>
                                                                    </div>


                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="मृत्यु दर्ता" id="deathRegister">
                                                                        <label class="form-check-label"
                                                                            for="deathRegister">
                                                                            मृत्यु दर्ता
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="बसाई सराई दर्ता" id="basaisarai">
                                                                        <label class="form-check-label" for="basaisarai">
                                                                            बसाई सराई दर्ता
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="विवाह दर्ता" id="marrige">
                                                                        <label class="form-check-label" for="marrige">
                                                                            विवाह दर्ता
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="सम्बन्ध बिछेद दर्ता" id="divorce">
                                                                        <label class="form-check-label" for="divorce">
                                                                            सम्बन्ध बिछेद दर्ता
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="नागरिकता" id="nagrita">
                                                                        <label class="form-check-label" for="nagrita">
                                                                            नागरिकता
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input Personalevent"
                                                                            name="personal_event" type="checkbox"
                                                                            value="अन्य" id="anye">
                                                                        <label class="form-check-label" for="anye">
                                                                            अन्य
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">OK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="मानव बेचबिखन" id="manabBechbikhan">
                                                <label class="form-check-label" for="manabBechbikhan">
                                                    मानव बेचबिखन
                                                </label>
                                            </div>

                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="यौनजन्य हिंसा" id="yonjanyeHinsa">
                                                <label class="form-check-label" for="yonjanyeHinsa">
                                                    यौनजन्य हिंसा
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="लैंगिक हिंसा" id="laingikHinsa">
                                                <label class="form-check-label" for="laingikHinsa">
                                                    लैंगिक हिंसा
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="घरेलु हिंसा" id="GghareluHinsa">
                                                <label class="form-check-label" for="GghareluHinsa">
                                                    घरेलु हिंसा
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="सम्पत्ति" id="sampati">
                                                <label class="form-check-label" for="sampati">
                                                    सम्पत्ति
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="रिट" id="rit">
                                                <label class="form-check-label" for="rit">
                                                    रिट
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="सम्बन्ध विच्छेद" id="sambandhBichhed">
                                                <label class="form-check-label" for="sambandhBichhed">
                                                    सम्बन्ध विच्छेद
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="न्यायिक पुनरावलोकन" id="punarablokan">
                                                <label class="form-check-label" for="punarablokan">
                                                    न्यायिक पुनरावलोकन
                                                </label>
                                            </div>
                                            <div class="form-check mx-2">
                                                <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                                    value="अन्य" id="other">
                                                <label class="form-check-label" for="other">
                                                    अन्य
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 form-group p-4">
                                    <label>संस्थालाई जानकारी? </label>
                                    <div class="row border p-3" style="height: auto">
                                        <div class="form-check mx-3">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="सिफारिश" id="sifaris">
                                            <label class="form-check-label" for="sifaris">
                                                सिफारिश
                                            </label>
                                        </div>


                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="पत्रपत्रिका" id="news">
                                            <label class="form-check-label" for="news">
                                                पत्रपत्रिका
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="रेडियो" id="radio">
                                            <label class="form-check-label" for="radio">
                                                रेडियो
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="साथीभाई/नातेदार" id="friends">
                                            <label class="form-check-label" for="friends">
                                                साथीभाई/नातेदार
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="वेबसाइट" id="website">
                                            <label class="form-check-label" for="website">
                                                वेबसाइट
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="कार्यक्रम" id="program">
                                            <label class="form-check-label" for="program">
                                                कार्यक्रम
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="टिभी" id="tv">
                                            <label class="form-check-label" for="tv">
                                                टिभी
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="सामाजिक संजाल" id="social_media">
                                            <label class="form-check-label" for="social_media">
                                                सामाजिक संजाल
                                            </label>
                                        </div>

                                        <div class="form-check mx-2">
                                            <input class="form-check-input my_checkbox1" name="inform_to_org" type="checkbox"
                                                value="अन्य" id="othr">
                                            <label class="form-check-label" for="othr">
                                                अन्य
                                            </label>
                                        </div>



                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-info z-depth-0"
                                        style="font-size: 15px">{{ $cases->id ? 'मुद्दा अपडेट गर्नुहोस्' : 'मुद्दा दर्ता गर्नुहोस्' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $("document").ready(function() {
        setTimeout(function() {
            $(".alert").remove();
        }, 1000); // 3 secs

    });

    $('.sifaris').on('change', function() {
        // alert('dfs');
            $('.sifaris').not(this).prop('checked', false);
        });

        $('.my_checkbox1').on('change', function() {
        // alert('dfs');
            $('.my_checkbox1').not(this).prop('checked', false);
        });

    // function btn_clicked(text) {
    //     document.getElementById("txt1").innerHTML = text;
    //     document.getElementById("txt2").innerHTML = text;
    //     // ("helloo");
    // }
</script>
@endpush
