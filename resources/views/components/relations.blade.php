<div class="tab-pane fade" id="pills-relations" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        @csrf


        <div class="row">
            <div class="col-md-12 form-group  ">
                <label for="" class="required">पक्ष र विपक्ष बिचको सम्बन्ध </label>
                <input type="text" name="name"
                    class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                    value="{{ old('name') }}" autocomplete="off" required>
                <x-invalid-feedback field="name"></x-invalid-feedback>
            </div>

            <div class="col-md-12 form-group  ">
                <hr>
                <label for="" class="required"> पक्षलाई जानकारी?</label>
                <hr>
                <div class="row">
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="सिफारिश"
                            id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">सिफारिश</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">पत्रपत्रिका</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">रेडियो </label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">साथीभाई/नातेदार</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">वेबसाइट</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">कार्यक्रम</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">टिभी</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">सामाजिक संजाल</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">अन्य</label>
                    </div>


                </div>
            </div>

            <div class="col-md-12 form-group  ">
                <hr>
                <label for="" class="required"> वारिस</label>
                <hr>
                <div class="row">
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="सिफारिश"
                            id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">स्वयम</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">स्व नियुक्ति</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">BWAN</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">अन्य</label>
                    </div>

                </div>
            </div>


        </div>

        <div class="col-md-12 d-flex">
            <div class="form-group ml-auto">
                <button class="btn btn-primary z-depth-0 font-18px">Add</button>
            </div>
        </div>
    </form>
</div>