<div>
    @push('styles')
    <style>
        label.required::after {
            content: " *";
            color: red;
            font-family: "Roboto", sans-serif;
        }

        select {
            height: calc(1.5em + .75rem + 4px) !important;
        }

    </style>
    @endpush
    <h3 class="font-weight-bold">{{ $organization->id ? 'Update Organization':'Add Organization'}}</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" aria-current="page">Organizations</li>
                <li class="breadcrumb-item active" aria-current="page">{{$organization->id ? 'Update':'Add'}}</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>
    <div class="card z-depth-0">
        <div class="card-header">
            <label >Organization details</label>
        </div>
        <div class="card-body">
            {{-- <div class="text-center light-blue lighten-5 indigo-text p-4">
                <h2 class="h2-responsive d-inline-block font-weight-bolder font-noto border-bottom border-primary pb-2">
                    {{ $updateMode ? 'Edit Organization' : 'Add Organization' }}
                </h2>
            </div> --}}
            <div class="my-4"></div>

            {{-- @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @lang('app.form_validation_error_message')
                <button type="button" class="close font-roboto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif --}}

            <form action="{{ $updateMode ? route('organization.update', $organization) : route('organization.store') }}" class="form" method="post" enctype="multipart/form-data">
                @csrf

                @isset($organization->id)
                @method('put')
                <input type="hidden" name="id" value="{{ $organization->id }}" hidden>
                @endisset

                <div class="row">
                    <div class="col-md-4 form-group  ">
                        <label for="" class="required">Organization Name</label>
                        <input type="text" name="name" class="form-control romanized rounded-0 {{ invalid_class('name') }}" value="{{ old('name', $organization->name) }}" autocomplete="off" required>
                        <x-invalid-feedback field="name"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group  ">
                        <label for="" class="required">Type</label>
                        <select name="type" class="custom-select">
                            <option value="headquarter">Headquarter</option>
                            <option value="division">Division</option>
                            <option value="sub-division">Sub Division</option>
                        </select>
                        <x-invalid-feedback field="type"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group  ">
                        <label for="" class="required">Province</label>
                        <select name="province_id" id="select-org-province-id" class="custom-select rounded-0 {{ invalid_class('province_id') }}" required>
                            <option value="">प्रदेश छान्नुहोस्</option>
                            @include('org-form-components.default-location',['settingsKey' => 'default_province_id', 'data' => $provinces])
                            @foreach ($provinces as $province)
                            <option value="{{ $province->id }}" @if(old('province_id', $organization->province_id) == $province->id) selected @endif>{{ $province->name }}</option>
                            @endforeach
                        </select>
                        <x-invalid-feedback field="province_id"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4 form-group  ">
                        <label for="" class="required">District</label>
                        <select name="district" id="select-org-district-id" class="custom-select rounded-0 {{ invalid_class('district') }}" required>
                            <option value="">जिल्ला छान्नुहोस्</option>
                            @include('org-form-components.default-location',['settingsKey' => 'default_district_id', 'data' => $districts])
                            @foreach ($districts as $district)
                            <option value="{{ $district->name }}" data-province-id="{{ $district->province->id}}" @if(old('districtname', $organization->org_district_id) == $district->name) selected @endif>{{ $district->name }}</option>
                            @endforeach
                        </select>
                        <x-invalid-feedback field="district"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4   form-group">
                        <label for="">Address</label>
                        <input type="text" name="address" class="form-control rounded-0 {{ invalid_class('address') }}" value="{{ old('address', $organization->address ?? '' ) }}">
                        <x-invalid-feedback field="address"></x-invalid-feedback>
                    </div>
                    
                    <div class="col-md-4   form-group">
                        <label for="">Phone</label>
                        <input type="text" name="phone" class="form-control rounded-0 {{ invalid_class('phone') }}" value="{{ old('phone', $organization->phone ?? '' ) }}">
                        <x-invalid-feedback field="phone"></x-invalid-feedback>
                    </div>

                    <div class="col-md-4   form-group">
                        <label for="">Email</label>
                        <input type="email"  name="email" class="form-control rounded-0 {{ invalid_class('email') }}" value="{{ old('email', $organization->email ?? '' ) }}">
                        <x-invalid-feedback field="email"></x-invalid-feedback>
                    </div>
                    <div class="col-md-4   form-group">
                        <label for="">Fax</label>
                        <input type="text" name="fax" class="form-control rounded-0 {{ invalid_class('fax') }}" value="{{ old('fax', $organization->email ?? '' ) }}">
                        <x-invalid-feedback field="email"></x-invalid-feedback>
                    </div>

                   
                </div>

                <div class="col-md-12 d-flex">
                    <div class="form-group ml-auto">
                        <button class="btn btn-primary z-depth-0 font-18px">{{$organization->id ? 'Update':'Add'}}</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
</div>

@push('scripts')
<script>
    $(function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);


        $('#select-org-province-id').change(function() {
            filterOptions($(this).val(), '#select-org-district-id option', 'province-id');
        });

        $('#select-org-district-id').change(function() {
            filterOptions($(this).val(), '#select-org-municipality-id option', 'district-id');
        });

        $('#select-prop-province-id').change(function() {
            filterOptions($(this).val(), '#select-prop-district-id option', 'province-id');
        });

        $('#select-prop-district-id').change(function() {
            filterOptions($(this).val(), '#select-prop-municipality-id option', 'district-id');
        });

        // Do not allow to type manually in some readonly required fields
        $(".readonly").on('keydown paste', function(e) {
            e.preventDefault();
        });

        // Auto form fill
        var propAddress = function() {
            let ward = $('#select-prop-ward').find(":selected").text();
            let municipality = $('#select-prop-municipality-id').find(":selected").text();
            return 'वडा नं. ' + ward + ', ' + municipality;
        }

        $('#self-house-owner').change(function() {
            if (this.checked) {
                // copy name, address, ward, phone
                $('#input-org-house-owner-name').val($('#input-prop-name').val());
                $('#input-org-house-owner-address').val(propAddress);
                // remove ward if unnecessary
                let ward = $('#select-prop-ward').find(":selected").text();
                $('#select-org-house-owner-ward > option[value=' + ward + ']').prop('selected', true);
                $('#input-org-house-owner-phone').val($('#input-prop-phone').val());
            }
        });

        $('#self-applicant').change(function() {
            if (this.checked) {
                // copy name, phone, address
                $('#input-applicant-name').val($('#input-prop-name').val());
                $('#input-applicant-phone').val($('#input-prop-phone').val());
                $('#input-applicant-address').val(propAddress);
            }
        });

    });

</script>
@include('layouts.partials.romanized-keyboard-scripts')
@endpush
