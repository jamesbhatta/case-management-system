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
            <input type="text" name="name" class="form-control romanized rounded-0" value="{{ old('name') }}">
        </div>

        <div class="col-md-3 form-group  ">
            <label for="" class="required">बीचको नाम</label>
            <input type="text" name="name" class="form-control romanized rounded-0" value="{{ old('name') }}">
        </div>

        <div class="col-md-3   form-group">
            <label for="">थर</label>
            <input type="text" name="address" class="form-control rounded-0" value="{{ old('address' )}}">
        </div>

        <div class="col-md-3   form-group">
            <label for="">जन्म मिति </label>
            <input type="text" name="date" id="input-fiscal-year-start" class="form-control nepali-date" value="{{old('date')}}" placeholder="Nepali YYYY-MM-DD">
        </div>

        <div class="col-md-3   form-group">
            <label for=""> उमेर</label>
            <input type="number" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>

        <div class="col-md-3   form-group">
            <label for=""> लिङ्ग</label>
            <select name="" id="" class="form-control">
                <option value="" disabled selected>लिङ्ग चयन गर्नुहोस्</option>
                <option value="पुरुष">पुरुष</option>
                <option value="महिला">महिला</option>
                <option value="अन्य">अन्य</option>
            </select>
        </div>
        <div class="col-md-3   form-group">
            <label for=""> वैवाहिक अवस्था</label>
            <select name="" id="" class="form-control">
                <option value="" disabled selected>वैवाहिक अवस्था चयन गर्नुहोस्</option>
                <option value="विवाहित">विवाहित</option>
                <option value="अविवाहित">अविवाहित</option>
                <option value="सम्बन्ध बिछेदी">सम्बन्ध बिछेदी</option>
                <option value="एकल">एकल </option>
                <option value="संगै बसेको">संगै बसेको </option>
            </select>
        </div>
        <div class="col-md-3   form-group">
            <label for=""> जिल्ला </label>
            <input type="text" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>
        <div class="col-md-3   form-group">
            <label for=""> नगरपालिका/गाउपालिका </label>
            <input type="text" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>
        <div class="col-md-3   form-group">
            <label for=""> वडा नम्बर </label>
            <input type="text" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>
        <div class="col-md-3   form-group">
            <label for=""> सम्पर्क नम्बर </label>
            <input type="text" name="phone" class="form-control rounded-0" value="{{ old('phone')}}">
        </div>
        <div class="col-md-3   form-group">
            <label for=""> इमेल</label>
            <input type="email" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>
        <div class="col-md-3   form-group">
            <label for=""> जाति</label>
            <select name="" id="" class="form-control">
                <option value="" disabled selected>जाति चयन गर्नुहोस्</option>
                <option value="खस आर्य">खस आर्य</option>
                <option value="जनजाति">जनजाति</option>
                <option value="मधेसी">मधेसी</option>
                <option value="दलित">दलित</option>
                <option value="अन्य">अन्य</option>
            </select>
        </div>

        <div class="col-md-3   form-group">
            <label for=""> धर्म</label>
            <select name="" id="" class="form-control">
                <option value="" disabled selected>धर्म चयन गर्नुहोस्</option>
                <option value="हिन्दु">हिन्दु</option>
                <option value="मुसलमान">मुसलमान</option>
                <option value="क्रिस्चियन">क्रिस्चियन</option>
                <option value="बौद्ध">बौद्ध</option>
                <option value="अन्य">अन्य</option>
            </select>
        </div>

        <div class="col-md-3   form-group">
            <label for=""> शिक्षा</label>
            <select name="" id="" class="form-control">
                <option value="" disabled selected>शिक्षा चयन गर्नुहोस्</option>
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

        <div class="col-md-3   form-group">
            <label for=""> अपाङ्गताको अवस्था</label>
            <select name="" id="" class="form-control">
                <option value="" disabled selected> अपाङ्गताको अवस्था चयन गर्नुहोस्</option>
                <option value="शारिरिक अपाङ्गता">शारिरिक अपाङ्गता</option>
                <option value="दृष्टि सम्बन्धी अपाङ्गता">दृष्टि सम्बन्धी अपाङ्गता</option>
                <option value="छैन">छैन</option>
            </select>
        </div>

        <div class="col-md-3   form-group">
            <label for=""> परिवारका सदस्यको सङ्ख्या</label>
            <input type="number" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>

        <div class="col-md-3   form-group">
            <label for="">परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
            <input type="number" name="phone" class="form-control rounded-0" value="{{ old('phone') }}">
        </div>



    </div>

    <div class="col-md-12 d-flex">
        <div class="form-group ml-auto">
            <button class="btn btn-primary z-depth-0 font-18px">Add</button>
        </div>
    </div>
</form>
</div>