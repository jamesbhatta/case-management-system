<div class="tab-pane fade show active" id="pills-case" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        @csrf

        @isset($organization->id)
            @method('put')
            <input type="hidden" name="id" value="{{ $organization->id }}" hidden>
        @endisset

        <div class="row">
            <div class="col-md-3 form-group  ">
                <label for="" class="required">*क्रम संख्या</label>
                <input type="text" name="name"
                    class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                    value="{{ old('name') }}" autocomplete="off" required>
                <x-invalid-feedback field="name"></x-invalid-feedback>
            </div>

            <div class="col-md-3 form-group  ">
                <label for="" class="required">*मुद्दा नं. </label>
                <select name="type" class="custom-select">
                    <option value="headquarter">Headquarter</option>
                    <option value="division">Division</option>
                    <option value="sub-division">Sub Division</option>
                </select>
                <x-invalid-feedback field="type"></x-invalid-feedback>
            </div>



            <div class="col-md-3   form-group">
                <label for="">*मिति</label>
                <input type="text" name="start" id="input-fiscal-year-start" class="form-control fiscal-year-date" value="" placeholder="Nepali YYYY-MM-DD">

            </div>

            <div class="col-md-3   form-group">
                <label for="">*मुद्दाको स्थिति</label>
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