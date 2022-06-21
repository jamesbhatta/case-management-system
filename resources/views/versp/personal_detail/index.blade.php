@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">व्यक्तिगत विवरण</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">VERSP</li>
                <li class="breadcrumb-item active" aria-current="page">व्यक्तिगत विवरण</li>
                <li class="breadcrumb-item active" aria-current="page">Add</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>

        <div class="container-flluid">

            <div class="card z-depth-0">
                <div class="card-body">
                    <label for="" class="h3 col-12 p-3 font-weight-bold border-bottom">व्यक्तिगत विवरण</label>
                    <div class="my-4">
                        <form
                            action="{{ $personalDetail->id ? route('personal-detail.update', $personalDetail) : route('personal-detail.store') }}"
                            method="POST">
                            @csrf
                            @isset($personalDetail->id)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-lg-3 form-group">
                                    <label>मुद्दा नं.</label>
                                    <input type="text" class="form-control p-4" style=""
                                        value="{{ $versp->id }}"  disabled>
                                        <input type="hidden" name="versp_id" class="form-control p-4" style=""
                                        value="{{ $versp->id }}" >

                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>पहिलो नाम</label>
                                    <input type="text" class="form-control p-4" name="first_name"
                                        value="{{ old('first_name', $personalDetail->first_name) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>बीचको नाम</label>
                                    <input type="text" class="form-control p-4" name="middle_name"
                                        value="{{ old('middle_name', $personalDetail->middle_name) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>थर</label>
                                    <input type="text" class="form-control p-4" name="last_name"
                                        value="{{ old('last_name', $personalDetail->last_name) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>जन्म मिति </label>
                                    <input type="text" name="dob" id="input-fiscal-year-start"
                                        class=" nepali-date form-control p-4" placeholder="Nepali YYYY-MM-DD"
                                        value="{{ old('dob', $personalDetail->dob) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>उमेर</label>
                                    <input type="number" class="form-control p-4" name="age"
                                        value="{{ old('age', $personalDetail->age) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>लिङ्ग</label>
                                    <select name="gender" id="" class="form-control" style="height: 50px">
                                        <option value="" selected>कृपया लिङ्ग चयन गर्नुहोस्</option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->gender }}" selected>
                                                {{ $personalDetail->gender }}</option>
                                        @endisset
                                        <option value="महिला">महिला</option>
                                        <option value="पुरुष">पुरुष</option>
                                        <option value="अन्य">अन्य</option>
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>वैवाहिक अवस्था</label>
                                    <select name="marrige_status" id="" class="form-control" style="height: 50px">
                                        <option value="" disabled selected>कृपया वैवाहिक अवस्था चयन गर्नुहोस्
                                        </option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->marrige_status }}" selected>
                                                {{ $personalDetail->marrige_status }}</option>
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
                                    <select name="district" id="" class="form-control" style="height: 50px">
                                        <option value="" disabled selected>कृपया जिल्ला चयन गर्नुहोस्</option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->district }}" selected>
                                                {{ $personalDetail->district }}</option>
                                        @endisset
                                        @foreach ($districts as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-3 form-group">
                                    <label>नगरपालिका/गाउपालिका </label>
                                    <select name="municipality" id="" class="form-control" style="height: 50px">
                                        <option value="" disabled selected>कृपया नगरपालिका/गाउपालिका चयन
                                            गर्नुहोस्
                                        </option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->municipality }}" selected>
                                                {{ $personalDetail->municipality }}</option>
                                        @endisset
                                        @foreach ($municipalities as $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>वडा नम्बर </label>
                                    <input type="text" class="form-control p-4" name="ward"
                                        value="{{ old('ward', $personalDetail->ward) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>सम्पर्क नम्बर </label>
                                    <input type="text" class="form-control p-4" name="contact"
                                        value="{{ old('contact', $personalDetail->contact) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>इमेल</label>
                                    <input type="text" class="form-control p-4" name="email"
                                        value="{{ old('email', $personalDetail->email) }}">
                                </div>
                                <div class="col-lg-3 form-group">
                                    <label>जाति</label>
                                    <select name="cast" id="" class="form-control" style="height: 50px">
                                        <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->cast }}" selected>
                                                {{ $personalDetail->cast }}</option>
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
                                    <select name="religion" id="" class="form-control" style="height: 50px">
                                        <option value="" disabled selected>कृपया धर्म चयन गर्नुहोस्</option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->religion }}" selected>
                                                {{ $personalDetail->religion }}</option>
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
                                    <select name="education" id="" class="form-control" style="height: 50px">
                                        <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->education }}" selected>
                                                {{ $personalDetail->education }}</option>
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
                                    <select name="disability_status" id="" class="form-control"
                                        style="height: 50px">
                                        <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                                        @isset($personalDetail->id)
                                            <option value="{{ $personalDetail->disability_status }}" selected>
                                                {{ $personalDetail->disability_status }}</option>
                                        @endisset
                                        <option value="शारिरिक अपाङ्गता">शारिरिक अपाङ्गता</option>
                                        <option value="दृष्टि सम्बन्धी अपाङ्गता">दृष्टि सम्बन्धी अपाङ्गता</option>
                                        <option value="छैन">छैन </option>
                                    </select>
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>परिवारका सदस्यको सङ्ख्या</label>
                                    <input type="number" class="form-control p-4" name="family_number"
                                        value="{{ old('family_number', $personalDetail->family_number) }}">
                                </div>
                                <div class="col-lg-4 form-group">
                                    <label>परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
                                    <input type="number" class="form-control p-4" name="disable_family_number"
                                        value="{{ old('disable_family_number', $personalDetail->disable_family_number) }}">
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

@push('scripts')
    <script>
        $(function() {
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })
    </script>
@endpush

@push('scripts')
    <script>
        $('.my_checkbox').on('change', function() {
            $('.my_checkbox').not(this).prop('checked', false);
        });

        $('.my_checkbox1').on('change', function() {
            $('.my_checkbox1').not(this).prop('checked', false);
        });
    </script>
@endpush
