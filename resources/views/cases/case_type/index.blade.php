@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
            <div class="bg-light mt-3">
                <label class="h3 font-weight-bold mt-3 mx-4">मुद्दाको किसिम</label>
                (<b>मुद्दा नम्बर</b>: {{ $cases->case_number }})
                (<b>मुद्दा प्रकार</b>: {{ $cases->case_type }})
                (<b>मुद्दा स्थिति</b>: {{ $cases->case_status }})
                
            </div>
            <div class="my-4">
                <form action="{{ $caseType->id ? route('case-type.update', $caseType) : route('case-type.store') }}"
                    method="POST">
                    @csrf
                    @isset($caseType->id)
                        @method('PUT')
                    @endisset
                    @isset($informToParty->id)
                    @else
                        <div class="col-lg-12 form-group">
                            <label> *मुद्दा नं.</label>
                            <input type="text" class="form-control p-4" name="" value="{{ $cases->case_number }}"
                                disabled>
                            <input type="hidden" class="form-control p-4" name="cases_id" value="{{ $cases->id }}">
                        </div>
                    @endisset

                    <div class="col-lg-12 form-group ">

                        <label>*मुद्दाको किसिम</label>
                        <div class="container-fluid">
                            <div class="row border p-3" style="height: auto">
                                <div class="form-check mx-3">
                                    <input class="form-check-input sifaris" type="checkbox"
                                        @if ($caseType->case_type == 'नागरिकता') checked @endif name="case_type" value="नागरिकता"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        नागरिकता
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                                <input class="form-check-input " type="checkbox" name="case_type"
                                                    value="व्यक्तिगत घटना" id="biyaktigatGhatna" data-toggle="modal"
                                                    data-target="#exampleModal"
                                                    >
                                                <label class="form-check-label" for="biyaktigatGhatna" data-toggle="modal"
                                                    data-target="#exampleModal" id="checked">
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
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="जन्म दर्ता (व्यक्तिगत घटना)" id="birthRegister" @if ($caseType->case_type == 'जन्म दर्ता (व्यक्तिगत घटना)'|| old('case_type')=="जन्म दर्ता (व्यक्तिगत घटना)") checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="birthRegister">
                                                                            जन्म दर्ता
                                                                        </label>
                                                                    </div>


                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="मृत्यु दर्ता (व्यक्तिगत घटना)" id="deathRegister" @if ($caseType->case_type == 'मृत्यु दर्ता (व्यक्तिगत घटना)'|| old('case_type')=="मृत्यु दर्ता (व्यक्तिगत घटना)") checked @endif>
                                                                        <label class="form-check-label"
                                                                            for="deathRegister">
                                                                            मृत्यु दर्ता
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="बसाई सराई दर्ता (व्यक्तिगत घटना)" id="basaisarai" @if ($caseType->case_type == 'बसाई सराई दर्ता (व्यक्तिगत घटना)'|| old('case_type')=="बसाई सराई दर्ता (व्यक्तिगत घटना)") checked @endif>
                                                                        <label class="form-check-label" for="basaisarai">
                                                                            बसाई सराई दर्ता
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="विवाह दर्ता (व्यक्तिगत घटना)" id="marrige" @if ($caseType->case_type == 'विवाह दर्ता (व्यक्तिगत घटना)'|| old('case_type')=="विवाह दर्ता (व्यक्तिगत घटना)") checked @endif>
                                                                        <label class="form-check-label" for="marrige">
                                                                            विवाह दर्ता
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="सम्बन्ध बिछेद दर्ता (व्यक्तिगत घटना)" id="divorce" @if ($caseType->case_type == 'सम्बन्ध बिछेद दर्ता (व्यक्तिगत घटना)'|| old('case_type')=="सम्बन्ध बिछेद दर्ता (व्यक्तिगत घटना)") checked @endif>
                                                                        <label class="form-check-label" for="divorce">
                                                                            सम्बन्ध बिछेद दर्ता
                                                                        </label>
                                                                    </div>
                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="नागरिकता (व्यक्तिगत घटना)" id="nagrita" @if ($caseType->case_type == 'नागरिकता (व्यक्तिगत घटना)'|| old('case_type')=="नागरिकता (व्यक्तिगत घटना)") checked @endif>
                                                                        <label class="form-check-label" for="nagrita">
                                                                            नागरिकता
                                                                        </label>
                                                                    </div>

                                                                    <div class="form-check mx-2">
                                                                        <input class="form-check-input sifaris" id="my_checkbox2"
                                                                            name="case_type" type="checkbox"
                                                                            value="अन्य (व्यक्तिगत घटना)" id="anye" @if ($caseType->case_type == 'अन्य (व्यक्तिगत घटना)') checked @endif>
                                                                        <label class="form-check-label" for="anye">
                                                                            अन्य
                                                                        </label>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal" onclick="myFunction()">OK</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'मानव बेचबिखन') checked @endif value="मानव बेचबिखन"
                                        id="manabBechbikhan">
                                    <label class="form-check-label" for="manabBechbikhan">
                                        मानव बेचबिखन
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'यौनजन्य हिंसा') checked @endif value="यौनजन्य हिंसा"
                                        id="yonjanyeHinsa">
                                    <label class="form-check-label" for="yonjanyeHinsa">
                                        यौनजन्य हिंसा
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'लैंगिक हिंसा') checked @endif value="लैंगिक हिंसा"
                                        id="laingikHinsa">
                                    <label class="form-check-label" for="laingikHinsa">
                                        लैंगिक हिंसा
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'घरेलु हिंसा') checked @endif value="घरेलु हिंसा"
                                        id="GghareluHinsa">
                                    <label class="form-check-label" for="GghareluHinsa">
                                        घरेलु हिंसा
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'सम्पत्ति') checked @endif value="सम्पत्ति"
                                        id="sampati">
                                    <label class="form-check-label" for="sampati">
                                        सम्पत्ति
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'रिट') checked @endif value="रिट" id="rit">
                                    <label class="form-check-label" for="rit">
                                        रिट
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'सम्बन्ध विच्छेद') checked @endif value="सम्बन्ध विच्छेद"
                                        id="sambandhBichhed">
                                    <label class="form-check-label" for="sambandhBichhed">
                                        सम्बन्ध विच्छेद
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'न्यायिक पुनरावलोकन') checked @endif value="न्यायिक पुनरावलोकन"
                                        id="punarablokan">
                                    <label class="form-check-label" for="punarablokan">
                                        न्यायिक पुनरावलोकन
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'अन्य') checked @endif value="अन्य" id="other">
                                    <label class="form-check-label" for="other">
                                        अन्य
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <input type="submit" name="" id="" class="btn btn-info" value="सेभ गर्नुहोस्">

            </div>
            </form>


        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
       const checked = document.querySelector('#my_checkbox2:checked') !== null;
        
        if(checked){
            document.getElementById("biyaktigatGhatna").checked = true;
        }else{
            document.getElementById("biyaktigatGhatna").checked = false;
        }
    

    $('.sifaris').on('change', function() {
            $('.sifaris').not(this).prop('checked', false);
            const checked = document.querySelector('#my_checkbox2:checked') !== null;
        
        if(checked){
            document.getElementById("biyaktigatGhatna").checked = true;
        }else{
            document.getElementById("biyaktigatGhatna").checked = false;
        }
        });

        $('.my_checkbox1').on('change', function() {
            $('.my_checkbox1').not(this).prop('checked', false);
        });

        function myFunction(){
            const checked = document.querySelector('#my_checkbox2:checked') !== null;
        
        if(checked){
            document.getElementById("biyaktigatGhatna").checked = true;
        }else{
            document.getElementById("biyaktigatGhatna").checked = false;
        }
        }
    </script>
@endpush
