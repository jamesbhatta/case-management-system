@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
            <label for="" class="h3 col-12 p-3 font-weight-bold border-bottom">मुद्दाको किसिम</label>
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
                            <label> मुद्दा नं.</label>
                            <input type="text" class="form-control p-4" name="" value="{{ $cases->case_number }}"
                                disabled>
                            <input type="hidden" class="form-control p-4" name="cases_id" value="{{ $cases->id }}">
                        </div>
                    @endisset

                    <div class="col-lg-12 form-group ">

                        <label>मुद्दाको किसिम</label>
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
                                    <input class="form-check-input sifaris" type="checkbox"
                                        @if ($caseType->case_type == 'व्यक्तिगत घटना') checked @endif name="case_type"
                                        value="व्यक्तिगत घटना" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        व्यक्तिगत घटना
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'मानव बेचबिखन') checked @endif value="मानव बेचबिखन"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        मानव बेचबिखन
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'यौनजन्य हिंसा') checked @endif value="यौनजन्य हिंसा"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        यौनजन्य हिंसा
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'लैंगिक हिंसा') checked @endif value="लैंगिक हिंसा"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        लैंगिक हिंसा
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'घरेलु हिंसा') checked @endif value="घरेलु हिंसा"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        घरेलु हिंसा
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'सम्पत्ति') checked @endif value="सम्पत्ति"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सम्पत्ति
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'रिट') checked @endif value="रिट"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        रिट
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'सम्बन्ध विच्छेद') checked @endif value="सम्बन्ध विच्छेद"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सम्बन्ध विच्छेद
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'न्यायिक पुनरावलोकन') checked @endif value="न्यायिक पुनरावलोकन"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        न्यायिक पुनरावलोकन
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="case_type"
                                        @if ($caseType->case_type == 'अन्य') checked @endif value="अन्य"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        अन्य
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>
                    <input type="submit" name="" id="" class="btn btn-info" value="Submiit">

            </div>
            </form>


        </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.sifaris').on('change', function() {
            $('.sifaris').not(this).prop('checked', false);
        });
    </script>
@endpush
