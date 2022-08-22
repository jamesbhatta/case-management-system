@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
            <label for="" class="h3 col-12 p-3 font-weight-bold border-bottom">विपक्षको विवरण</label>
            <div class="my-4">
                <form
                    action="{{ $oppositParty->id ? route('opposit-party.update', $oppositParty) : route('opposit-party.store') }}"
                    method="POST">
                    @csrf
                    @isset($oppositParty->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*मुद्दा नं.</label>
                            <input type="text" class="form-control p-4" value="{{ $cases->case_number }}" disabled>
                            <input type="hidden" name="cases_id" value="{{ $cases->id }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*पहिलो नाम</label>
                            <input type="text" class="form-control p-4" name="first_name"
                                value="{{ old('first_name', $oppositParty->first_name) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>बीचको नाम</label>
                            <input type="text" class="form-control p-4" name="middle_name"
                                value="{{ old('middle_name', $oppositParty->middle_name) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*थर</label>
                            <input type="text" class="form-control p-4" name="last_name"
                                value="{{ old('last_name', $oppositParty->last_name) }}">
                        </div>
                        {{-- <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                        <label>*जन्म मिति </label>
                        <input type="text" name="dob" id="input-fiscal-year-start"
                            class=" nepali-date form-control p-4" placeholder="Nepali YYYY-MM-DD"
                            value="{{ old('dob', $oppositParty->dob) }}">
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                        <label>*उमेर</label>
                        <input type="number" class="form-control p-4" name="age"
                            value="{{ old('age', $oppositParty->age) }}">
                    </div> --}}
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*जन्म मिति(BS) </label>
                            <input type="text" name="dob" id="input-fiscal-year-start"
                                class=" nepali-date form-control p-4" placeholder="Nepali YYYY-MM-DD"
                                value="{{ old('dob', $oppositParty->dob) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*जन्म मिति(AD) </label>
                            <input type="date" name="dob" class="form-control p-4" placeholder="YYYY-MM-DD"
                                id="dob" onchange="ageCalculate()" value="{{ old('dob', $oppositParty->dob) }}">
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*उमेर</label>
                            <input type="number" class="form-control p-4" name="age" id="myage"
                                value="{{ old('age', $oppositParty->age) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*लिङ्ग</label>
                            <select name="gender" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया लिङ्ग चयन गर्नुहोस्</option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->gender }}" selected>{{ $oppositParty->gender }}
                                    </option>
                                @endisset
                                <option value="महिला" @if (old('gender') == 'महिला') selected @endif>महिला</option>
                                <option value="पुरुष" @if (old('gender') == 'पुरुष') selected @endif>पुरुष</option>
                                <option value="अन्य" @if (old('gender') == 'अन्य') selected @endif>अन्य</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*वैवाहिक अवस्था</label>
                            <select name="marrige_status" id="" class="form-control"style="height:50px">
                                <option value="" disabled selected>कृपया वैवाहिक अवस्था चयन गर्नुहोस्
                                </option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->marrige_status }}" selected>
                                        {{ $oppositParty->marrige_status }}</option>
                                @endisset
                                <option value="विवाहित" @if (old('marrige_status') == 'विवाहित') selected @endif>विवाहित</option>
                                <option value="अविवाहित" @if (old('marrige_status') == 'अविवाहित') selected @endif>अविवाहित</option>
                                <option value="सम्बन्ध बिछेदी" @if (old('marrige_status') == 'सम्बन्ध बिछेदी') selected @endif>सम्बन्ध विच्छेद</option>
                                <option value="एकल" @if (old('marrige_status') == 'एकल') selected @endif>एकल</option>
                                <option value="संगै बसेको" @if (old('marrige_status') == 'संगै बसेको') selected @endif>संगै बसेको
                                </option>
                            </select>
                        </div>
                        {{-- <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*जिल्ला </label>
                            <select name="district" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया जिल्ला चयन गर्नुहोस्</option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->district }}" selected>{{ $oppositParty->district }}
                                    </option>
                                @endisset
                                @foreach ($districts as $item)
                                    <option value="{{ $item->name }}" @if (old('district') == $item->name) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*नगरपालिका/गाउपालिका </label>
                            <select name="municipality" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया नगरपालिका/गाउपालिका चयन
                                    गर्नुहोस्
                                </option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->municipality }}" selected>
                                        {{ $oppositParty->municipality }}</option>
                                @endisset
                                @foreach ($municipalities as $item)
                                    <option value="{{ $item->name }}" @if (old('municipality') == $item->name) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div> --}}
                        <div class="form-group col-xl-3 col-lg-4 col-md-6">
                            <label for="select-district-id">*जिल्ला</label>
                            <select id="select-district-id" class="custom-select" name="district" style="height: 50px">
                                @isset($partyDetail->id)
                                    <option value="{{ $partyDetail->district }}" selected>
                                        {{ $partyDetail->district }}</option>
                                @else
                                    <option value="">जिल्ला छान्नुहोस्</option>
                                @endisset
                                @foreach ($districts as $district)
                                    <option value="{{ $district->name }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-xl-3 col-lg-4 col-md-6">
                            <label for="select-municipality-id">*नगरपालिका/गाउँपालिका</label>
                            <select name="municipality" id="select-municipality-id" class="custom-select"
                                style="height: 50px">

                                @isset($partyDetail->id)
                                    <option value="{{ $partyDetail->municipality }}" selected>
                                        {{ $partyDetail->municipality }}</option>
                                @else
                                    <option value="">नगरपालिका/गाउँपालिका छान्नुहोस्</option>
                                @endisset
                                @foreach ($districts as $district)
                                    {{-- <option value="">{{$district->municipalities}}</option> --}}
                                    @foreach ($district->municipalities as $item)
                                        <option value="{{ $item->name }}"
                                            data-municipality-name="{{ $district->name }}">{{ $item->name }}</option>
                                        {{-- <option value="{{ $district->id }}" data-province-id="{{ $province->id }}">
                                            {{ $district->name }}</option> --}}
                                    @endforeach
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*वडा नम्बर </label>
                            <input type="text" class="form-control p-4" name="ward"
                                value="{{ old('ward', $oppositParty->ward) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*सम्पर्क नम्बर </label>
                            <input type="text" class="form-control p-4" name="contact" maxlength="10"
                                value="{{ old('contact', $oppositParty->contact) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>इमेल</label>
                            <input type="text" class="form-control p-4" name="email"
                                value="{{ old('email', $oppositParty->email) }}">
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*जाति</label>
                            <select name="cast" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->cast }}" selected>{{ $oppositParty->cast }}</option>
                                @endisset
                                <option value="खस आर्य" @if (old('cast') == 'खस आर्य') selected @endif>खस आर्य
                                </option>
                                <option value="जनजाति" @if (old('cast') == 'जनजाति') selected @endif>जनजाति</option>
                                <option value="मधेसी" @if (old('cast') == 'मधेसी') selected @endif>मधेसी</option>
                                <option value="दलित" @if (old('cast') == 'दलित') selected @endif>दलित </option>
                                <option value="अन्य" @if (old('cast') == 'अन्य') selected @endif>अन्य</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*धर्म</label>
                            <select name="religion" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया धर्म चयन गर्नुहोस्</option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->religion }}" selected>{{ $oppositParty->religion }}
                                    </option>
                                @endisset
                                <option value="हिन्दु" @if (old('religion') == 'हिन्दु') selected @endif>हिन्दु</option>
                                <option value="मुसलमान" @if (old('religion') == 'मुसलमान') selected @endif>मुसलमान
                                </option>
                                <option value="क्रिस्चियन" @if (old('religion') == 'क्रिस्चियन') selected @endif>क्रिस्चियन
                                </option>
                                <option value="बौद्ध" @if (old('religion') == 'बौद्ध') selected @endif>बौद्ध</option>
                                <option value="अन्य" @if (old('religion') == 'अन्य') selected @endif>अन्य</option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*शिक्षा</label>
                            <select name="education" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया शिक्षा चयन गर्नुहोस्</option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->education }}" selected>
                                        {{ $oppositParty->education }}</option>
                                @endisset
                                <option value="असाक्षर"@if (old('education') == 'र्निरक्षर') selected @endif>र्निरक्षर
                                </option>
                                <option value="साक्षर"@if (old('education') == 'साक्षर') selected @endif>साक्षर</option>
                                <option value="माध्यमिक तह "@if (old('education') == 'माध्यमिक तह') selected @endif>माध्यमिक तह
                                </option>
                                <option value="एस.एल.सी"@if (old('education') == 'एस.एल.सी') selected @endif>एस.एल.सी
                                </option>
                                <option value="मध्यवर्ती"@if (old('education') == 'मध्यवर्ती') selected @endif>
                                    मध्यवर्ती</option>
                                <option value="स्नातक"@if (old('education') == 'स्नातक') selected @endif>स्नातक</option>
                                <option value="स्नातकोत्तर"@if (old('education') == 'स्नातकोत्तर') selected @endif>स्नातकोत्तर</option>
                                <option value="पी.एच.डी."@if (old('education') == 'पी.एच.डी.') selected @endif>पी.एच.डी.</option>
                            </select>
                        </div>

                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*अपाङ्गताको अवस्था</label>
                            <select name="disability_status" id="" class="form-control" style="height:50px">
                                <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                @isset($oppositParty->id)
                                    <option value="{{ $oppositParty->disability_status }}" selected>
                                        {{ $oppositParty->disability_status }}</option>
                                @endisset
                                <option value="शारिरिक अपाङ्गता" @if (old('disability_status') == 'शारिरिक अपाङ्गता') selected @endif>
                                    शारिरिक अपाङ्गता</option>
                                <option value="दृष्टि सम्बन्धी अपाङ्गता"
                                    @if (old('disability_status') == 'दृष्टि सम्बन्धी अपाङ्गता') selected @endif>दृष्टि सम्बन्धी अपाङ्गता</option>
                                <option value="छैन" @if (old('disability_status') == 'छैन') selected @endif>छैन </option>
                            </select>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 form-group">
                            <label>*परिवारका सदस्यको सङ्ख्या</label>
                            <input type="number" class="form-control p-4" name="family_number"
                                value="{{ old('family_number', $oppositParty->family_number) }}">
                        </div>
                        <div class="col-xl-6 form-group">
                            <label>*परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
                            <input type="number" class="form-control p-4" name="disable_family_number"
                                value="{{ old('disable_family_number', $oppositParty->disable_family_number) }}">
                        </div>
                        <div class="col-lg-6 form-group">

                            <input type="submit" name="" id="" class="btn btn-info"
                                value="सेभ गर्नुहोस्">
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {

            $('#select-district-id').change(function() {

                filterOptions($(this).val(), '#select-municipality-id option', 'municipality-name');
            });

        });

        function ageCalculate() {

            var today = new Date();

            var dob = document.getElementById("dob").value;
            var d = new Date(dob);
            var y1 = d.getFullYear();
            var m1 = d.getMonth();
            var d1 = d.getDate();


            var y2 = today.getFullYear();
            var m2 = today.getMonth();
            var m3 = today.getDate();

            if (m1 > m2) {
                m2 = m2 + 12;
                y2 = y2 - 1;
            }

            var year = y2 - y1;
            document.getElementById("myage").value = year;
        }
    </script>
@endpush
