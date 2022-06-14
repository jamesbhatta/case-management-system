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