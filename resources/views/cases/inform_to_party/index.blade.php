@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
          
            <div class="mt-3 border-bottom">
                <label class="h3 font-weight-bold mt-3 mx-4">पक्षलाई जानकारी

                </label>
                (<b>मुद्दा नम्बर</b>: {{ $cases->case_number }})
                (<b>मुद्दा प्रकार</b>: {{ $cases->case_type }})
                (<b>मुद्दा स्थिति</b>: {{ $cases->case_status }})
            </div>
            <div class="my-4">
                <form
                    action="{{ $informToParty->id ? route('inform-to-party.update', $informToParty) : route('inform-to-party.store') }}"
                    method="POST">
                    @csrf
                    @isset($informToParty->id)
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

                    <div class="col-lg-12 form-group">
                        <label>* पक्ष र विपक्ष बिचको सम्बन्ध</label>
                        <input type="text" class="form-control p-4" name="relation"
                            value="{{ old('relation', $informToParty->relation) }}">
                    </div>
                    <div class="col-lg-12 form-group ">
                        <label>*पक्षलाई जानकारी?</label>
                        <div class="container-fluid">
                            <div class="row border p-3" style="height: auto">
                                <div class="form-check mx-3">
                                    <input class="form-check-input sifaris" type="checkbox"
                                        @if ( $informToParty->info == 'सिफारिश'|| old('info')=="सिफारिश") checked @endif name="info" value="सिफारिश"
                                        id="sifaris">
                                    <label class="form-check-label" for="sifaris">
                                        सिफारिश
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox"
                                        @if ($informToParty->info == 'पत्रपत्रिका'|| old('info')=="पत्रपत्रिका") checked @endif name="info" value="पत्रपत्रिका"
                                        id="patrika">
                                    <label class="form-check-label" for="patrika">
                                        पत्रपत्रिका
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'रेडियो'|| old('info')=="रेडियो") checked @endif value="रेडियो"
                                        id="radio">
                                    <label class="form-check-label" for="radio">
                                        रेडियो
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'साथीभाई/नातेदार'|| old('info')=="साथीभाई/नातेदार") checked @endif value="साथीभाई/नातेदार"
                                        id="friends">
                                    <label class="form-check-label" for="friends">
                                        साथीभाई/नातेदार
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'वेबसाइट'|| old('info')=="वेबसाइट") checked @endif value="वेबसाइट"
                                        id="website">
                                    <label class="form-check-label" for="website">
                                        वेबसाइट
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'कार्यक्रम'|| old('info')=="कार्यक्रम") checked @endif value="कार्यक्रम"
                                        id="program">
                                    <label class="form-check-label" for="program">
                                        कार्यक्रम
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'टिभी'|| old('info')=="टिभी") checked @endif value="टिभी"
                                        id="tv">
                                    <label class="form-check-label" for="tv">
                                        टिभी
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'सामाजिक संजाल'|| old('info')=="सामाजिक संजाल") checked @endif value="सामाजिक संजाल"
                                        id="social_media">
                                    <label class="form-check-label" for="social_media">
                                        सामाजिक संजाल
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'अन्य'|| old('info')=="अन्य") checked @endif value="अन्य"
                                        id="other">
                                    <label class="form-check-label" for="other">
                                        अन्य
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 form-group ">
                        <label>*वारिस</label>
                        <div class="container-fluid">
                            <div class="row border p-3" style="height: auto">
                                <div class="form-check mx-3">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'स्वयम'||old('heir_name')=="स्वयम") checked @endif value="स्वयम"
                                        id="self">
                                    <label class="form-check-label" for="self">
                                        स्वयम
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'स्व नियुक्ति'||old('heir_name')=="स्व नियुक्ति") checked @endif value="स्व नियुक्ति"
                                        id="self_hire">
                                    <label class="form-check-label" for="self_hire">
                                        स्व नियुक्ति
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'BWAN'||old('heir_name')=="BWAN") checked @endif value="BWAN"
                                        id="bwan">
                                    <label class="form-check-label" for="bwan">
                                        BWAN
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'अन्य'||old('heir_name')=="अन्य") checked @endif value="अन्य"
                                        id="others">
                                    <label class="form-check-label" for="others">
                                        अन्य
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">

                        <input type="submit" name="" id="" class="btn btn-info" value="सेभ गर्नुहोस्">
                    </div>


            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        $('.sifaris').on('change', function() {
            $('.sifaris').not(this).prop('checked', false);
        });

        $('.waris').on('change', function() {
            $('.waris').not(this).prop('checked', false);
        });
    </script>
@endpush
