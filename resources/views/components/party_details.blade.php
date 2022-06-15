<div class="card z-depth-0">
    <div class="card-body">
        <div class="my-4">
            <form action="">
                <div class="row">
                    <div class="col-lg-3 form-group">
                        <label>मुद्दा नं.</label>
                        <input type="text" class="my-text" value="{{$cases ?? ''}}">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>पहिलो नाम</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>बीचको नाम</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>थर</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>जन्म मिति </label>
                        <input type="text" name="date" id="input-fiscal-year-start" class=" nepali-date my-text" placeholder="Nepali YYYY-MM-DD">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>उमेर</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>लिङ्ग</label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया लिङ्ग चयन गर्नुहोस्</option>
                            <option value="महिला">महिला</option>
                            <option value="पुरुष">पुरुष</option>
                            <option value="अन्य">अन्य</option>
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>वैवाहिक अवस्था</label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया वैवाहिक अवस्था चयन गर्नुहोस्</option>
                            <option value="विवाहित">विवाहित</option>
                            <option value="अविवाहित">अविवाहित</option>
                            <option value="सम्बन्ध बिछेदी">सम्बन्ध बिछेदी</option>
                            <option value="एकल">एकल</option>
                            <option value="संगै बसेको">संगै बसेको</option>
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>जिल्ला </label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया जिल्ला  चयन गर्नुहोस्</option>
                            <option value="विवाहित">विवाहित</option>
                            <option value="अविवाहित">अविवाहित</option>
                            <option value="सम्बन्ध बिछेदी">सम्बन्ध बिछेदी</option>
                            <option value="एकल">एकल</option>
                            <option value="संगै बसेको">संगै बसेको</option>
                        </select>
                    </div>
        
                    <div class="col-lg-3 form-group">
                        <label>नगरपालिका/गाउपालिका </label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया नगरपालिका/गाउपालिका   चयन गर्नुहोस्</option>
                            <option value="विवाहित">विवाहित</option>
                            <option value="अविवाहित">अविवाहित</option>
                            <option value="सम्बन्ध बिछेदी">सम्बन्ध बिछेदी</option>
                            <option value="एकल">एकल</option>
                            <option value="संगै बसेको">संगै बसेको</option>
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>वडा नम्बर </label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>सम्पर्क नम्बर  </label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>इमेल</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>जाति</label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                            <option value="खस आर्य">खस आर्य</option>
                            <option value="जनजाति">जनजाति</option>
                            <option value="मधेसी">मधेसी</option>
                            <option value="दलित">दलित </option>
                            <option value="अन्य">अन्य</option>
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>जाति</label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                            <option value="हिन्दु">हिन्दु</option>
                            <option value="मुसलमान">मुसलमान</option>
                            <option value="क्रिस्चियन">क्रिस्चियन</option>
                            <option value="बौद्ध">बौद्ध</option>
                            <option value="अन्य">अन्य</option>
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>शिक्षा</label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
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
        
                    <div class="col-lg-3 form-group">
                        <label>अपाङ्गताको अवस्था</label>
                        <select name="" id="" class="my-text">
                            <option value="" disabled selected>कृपया जाति चयन गर्नुहोस्</option>
                            <option value="शारिरिक अपाङ्गता">शारिरिक अपाङ्गता</option>
                            <option value="दृष्टि सम्बन्धी अपाङ्गता">दृष्टि सम्बन्धी अपाङ्गता</option>
                            <option value="छैन">छैन </option>
                        </select>
                    </div>
                    <div class="col-lg-6 form-group">
                        <label>परिवारका सदस्यको सङ्ख्या</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-6 form-group">
                        <label>परिवारमा अपाङ्गता भएका व्यक्तिहरूको सङ्ख्या</label>
                        <input type="text" class="my-text">
                    </div>
                    <div class="col-lg-6 form-group">
                        
                        <input type="submit" name="" id="" class="btn btn-info" value="Submiit">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>