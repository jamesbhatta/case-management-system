<div class="tab-pane fade" id="pills-case_type" role="tabpanel" aria-labelledby="pills-profile-tab">
    <form action="" class="form" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12 form-group  ">
                <label for="" class="required">मुद्दाको किसिम</label>
                <hr>
                <div class="row">
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="सिफारिश"
                            id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">नागरिकता</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">व्यक्तिगत घटना</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">मानव बेचबिखन</label>
                    </div>
                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">यौनजन्य हिंसा</label>
                    </div>

                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">लैंगिक हिंसा</label>
                    </div>

                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">घरेलु हिंसा</label>
                    </div>

                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">सम्पत्ति</label>
                    </div>

                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">रिट</label>
                    </div>

                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">सम्बन्ध विच्छेद</label>
                    </div>

                    <div class="form-check mx-3">
                        <input class="form-check-input" type="checkbox" value="" id="formCheckDefault">
                        <label class="form-check-label" for="formCheckDefault">न्यायिक
                            पुनरावलोकन</label>
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
