@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख व्यवस्थापन</h3>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">मुद्दा अभिलेख व्यवस्थापन</li>
                <li class="breadcrumb-item active" aria-current="page"></li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>


        <div>
            <div class="card z-depth-0">
                <div class="card-header" style="overflow: scroll;scrollbar-width: none;">
                  
                </div>
            </div>
        </div>
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                
                {{-- <x-party_details cases="{{$cases->case_number}}" casesId="1"></x-party_details> --}}
                <div class="card z-depth-0">
                    <div class="card-body">
                        <div class="my-4">
                            <form action="{{$oppositParty->id? route('opposit-party.update',$oppositParty):route('opposit-party.store') }}" method="POST">
                                @csrf
                                @isset($oppositParty->id)
                                    @method('PUT')
                                @endisset
                                <div class="row">
                                    @isset($cases->id)
                                        <div class="col-lg-3 form-group">
                                            <label>मुद्दा नं.</label>
                                            <input type="text" class="my-text" value="{{ $cases->case_number }}"
                                                disabled>
                                            <input type="hidden" name="cases_id" value="{{ $cases->id }}">
                                        </div>
                                    @else
                                        <input type="hidden" name="cases_id" value="{{ $oppositParty->id }}">
                                    @endisset
                                    <div class="col-lg-3 form-group">
                                        <label>पहिलो नाम</label>
                                        <input type="text" class="my-text" name="first_name"
                                            value="{{ old('first_name', $oppositParty->first_name) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>बीचको नाम</label>
                                        <input type="text" class="my-text" name="middle_name"
                                            value="{{ old('middle_name', $oppositParty->middle_name) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>थर</label>
                                        <input type="text" class="my-text" name="last_name"
                                            value="{{ old('last_name', $oppositParty->last_name) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>जन्म मिति </label>
                                        <input type="text" name="dob" id="input-fiscal-year-start"
                                            class=" nepali-date my-text" placeholder="Nepali YYYY-MM-DD"
                                            value="{{ old('dob', $oppositParty->dob) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>उमेर</label>
                                        <input type="number" class="my-text" name="age"
                                            value="{{ old('age', $oppositParty->age) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>लिङ्ग</label>
                                        <select name="gender" id="" class="my-text">
                                            <option value="" disabled selected>कृपया लिङ्ग चयन गर्नुहोस्</option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->gender}}" selected>{{$oppositParty->gender}}</option>
                                        @endisset
                                            <option value="महिला">महिला</option>
                                            <option value="पुरुष">पुरुष</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>वैवाहिक अवस्था</label>
                                        <select name="marrige_status" id="" class="my-text">
                                            <option value="" disabled selected>कृपया वैवाहिक अवस्था चयन गर्नुहोस्
                                            </option>
                                            @isset($oppositParty->id)
                                                <option value="{{$oppositParty->marrige_status}}" selected>{{$oppositParty->marrige_status}}</option>
                                            @endisset
                                            <option value="विवाहित">विवाहित</option>
                                            <option value="अविवाहित">अविवाहित</option>
                                            <option value="सम्बन्ध बिछेदी">सम्बन्ध बिछेदी</option>
                                            <option value="एकल">एकल</option>
                                            <option value="संगै बसेको">संगै बसेको</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>जिल्ला </label>
                                        <select name="district" id="" class="my-text">
                                            <option value="" disabled selected>कृपया जिल्ला चयन गर्नुहोस्</option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->district}}" selected>{{$oppositParty->district}}</option>
                                        @endisset
                                            @foreach ($districts as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-3 form-group">
                                        <label>नगरपालिका/गाउपालिका </label>
                                        <select name="municipality" id="" class="my-text">
                                            <option value="" disabled selected>कृपया नगरपालिका/गाउपालिका चयन
                                                गर्नुहोस्
                                            </option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->municipality}}" selected>{{$oppositParty->municipality}}</option>
                                        @endisset
                                            @foreach ($municipalities as $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>वडा नम्बर </label>
                                        <input type="text" class="my-text" name="ward"
                                            value="{{ old('ward', $oppositParty->ward) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>सम्पर्क नम्बर </label>
                                        <input type="text" class="my-text" name="contact"
                                            value="{{ old('contact', $oppositParty->contact) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>इमेल</label>
                                        <input type="text" class="my-text" name="email"
                                            value="{{ old('email',$oppositParty->email) }}">
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>जाति</label>
                                        <select name="cast" id="" class="my-text">
                                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->cast}}" selected>{{$oppositParty->cast}}</option>
                                        @endisset
                                            <option value="खस आर्य">खस आर्य</option>
                                            <option value="जनजाति">जनजाति</option>
                                            <option value="मधेसी">मधेसी</option>
                                            <option value="दलित">दलित </option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>धर्म</label>
                                        <select name="religion" id="" class="my-text">
                                            <option value="" disabled selected>कृपया धर्म चयन गर्नुहोस्</option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->religion}}" selected>{{$oppositParty->religion}}</option>
                                        @endisset
                                            <option value="हिन्दु">हिन्दु</option>
                                            <option value="मुसलमान">मुसलमान</option>
                                            <option value="क्रिस्चियन">क्रिस्चियन</option>
                                            <option value="बौद्ध">बौद्ध</option>
                                            <option value="अन्य">अन्य</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 form-group">
                                        <label>शिक्षा</label>
                                        <select name="education" id="" class="my-text">
                                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->education}}" selected>{{$oppositParty->education}}</option>
                                        @endisset
                                            <option value="असाक्षर">असाक्षर</option>
                                            <option value="साक्षर">साक्षर</option>
                                            <option value="माध्यमिक तह ">माध्यमिक तह </option>
                                            <option value="एस.एल.सी">एस.एल.सी</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="स्नातक">स्नातक</option>
                                            <option value="Masters">Masters</option>
                                            <option value="PHD">PHD</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-4 form-group">
                                        <label>अपाङ्गताको अवस्था</label>
                                        <select name="disability_status" id="" class="my-text">
                                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                            @isset($oppositParty->id)
                                            <option value="{{$oppositParty->disability_status}}" selected>{{$oppositParty->disability_status}}</option>
                                        @endisset
                                            <option value="शारिरिक अपाङ्गता">शारिरिक अपाङ्गता</option>
                                            <option value="दृष्टि सम्बन्धी अपाङ्गता">दृष्टि सम्बन्धी अपाङ्गता</option>
                                            <option value="छैन">छैन </option>
                                        </select>
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>परिवारका सदस्यको सङ्ख्या</label>
                                        <input type="number" class="my-text" name="family_number"
                                            value="{{ old('family_number',$oppositParty->family_number) }}">
                                    </div>
                                    <div class="col-lg-4 form-group">
                                        <label>परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
                                        <input type="number" class="my-text" name="disable_family_number"
                                            value="{{ old('disable_family_number',$oppositParty->disable_family_number) }}">
                                    </div>
                                    <div class="col-lg-6 form-group">

                                        <input type="submit" name="" id="" class="btn btn-info"
                                            value="Submiit">
                                    </div>
                                </div>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
