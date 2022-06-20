@extends('cases.detail')
@section('caseContent')
    <div class="container">
        @include('alerts.all')
    </div>
    <div class="card z-depth-0">
        <div class="card-body">
            <label for="" class="h3 col-12 p-3 font-weight-bold border-bottom">पक्षलाई जानकारी</label>
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
                            <label> पक्ष र विपक्ष बिचको सम्बन्ध</label>
                            <input type="text" class="form-control p-4" name="" value="{{ $cases->case_number }}"
                                disabled>
                            <input type="hidden" class="form-control p-4" name="cases_id" value="{{ $cases->id }}">
                        </div>
                    @endisset

                    <div class="col-lg-12 form-group">
                        <label> पक्ष र विपक्ष बिचको सम्बन्ध</label>
                        <input type="text" class="form-control p-4" name="relation"
                            value="{{ old('relation', $informToParty->relation) }}">
                    </div>
                    <div class="col-lg-12 form-group ">
                        <label>पक्षलाई जानकारी?</label>
                        <div class="container-fluid">
                            <div class="row border p-3" style="height: 50px">
                                <div class="form-check mx-3">
                                    <input class="form-check-input sifaris" type="checkbox"
                                        @if ($informToParty->info == 'सिफारिश') checked @endif name="info" value="सिफारिश"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सिफारिश
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox"
                                        @if ($informToParty->info == 'पत्रपत्रिका') checked @endif name="info" value="पत्रपत्रिका"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        पत्रपत्रिका
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'रेडियो') checked @endif value="रेडियो"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        रेडियो
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'साथीभाई/नातेदार') checked @endif value="साथीभाई/नातेदार"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        साथीभाई/नातेदार
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'वेबसाइट') checked @endif value="वेबसाइट"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        वेबसाइट
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'कार्यक्रम') checked @endif value="कार्यक्रम"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        कार्यक्रम
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'टिभी') checked @endif value="टिभी"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        टिभी
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'सामाजिक संजाल') checked @endif value="सामाजिक संजाल"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        सामाजिक संजाल
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input sifaris" type="checkbox" name="info"
                                        @if ($informToParty->info == 'अन्य') checked @endif value="अन्य"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        अन्य
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 form-group ">
                        <label>वारिस</label>
                        <div class="container-fluid">
                            <div class="row border p-3" style="height: 50px">
                                <div class="form-check mx-3">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'स्वयम') checked @endif value="स्वयम"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        स्वयम
                                    </label>
                                </div>

                                <div class="form-check mx-2">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'स्व नियुक्ति') checked @endif value="स्व नियुक्ति"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        स्व नियुक्ति
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'BWAN') checked @endif value="BWAN"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        BWAN
                                    </label>
                                </div>
                                <div class="form-check mx-2">
                                    <input class="form-check-input waris" name="heir_name" type="checkbox"
                                        @if ($informToParty->heir_name == 'अन्य') checked @endif value="अन्य"
                                        id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        अन्य
                                    </label>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 form-group">

                        <input type="submit" name="" id="" class="btn btn-info" value="Submiit">
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
