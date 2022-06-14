<div class="tab-pane fade" id="pills-consultation" role="tabpanel"
                        aria-labelledby="pills-profile-tab">
                        <div class="alert alert-primary" role="alert">
                            <h4 class="text-center">कानूनी सेवा</h4>
                        </div>
                        <form action="" class="form" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-4 form-group  ">
                                    <label for="" class="required">मिति</label>
                                    <input type="date" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>
                                <div class="col-md-4 form-group  ">
                                    <label for="" class="required">अन्यन्त्र सिफारिश </label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>
                                <div class="col-md-4 form-group  ">
                                    <label for="" class="required">सेवा प्रकार</label>
                                   <select name="" id="" class="form-control">
                                    <option value="" disabled selected>सेवा प्रकार चयन गर्नुहोस्</option>
                                    <option value="परामर्श">परामर्श</option>
                                    <option value="सहजीकरण">सहजीकरण</option>
                                    <option value="मस्यौदा">मस्यौदा</option>
                                    <option value="बहस">बहस</option>
                                    <option value="मेलमिलाप">मेलमिलाप</option>
                                    <option value="">फैसला कार्यान्वयन</option>
                                    <option value="">प्रहरी कार्यालय</option>
                                    <option value="">जिल्ला अदालत</option>
                                    <option value="">उच्च अदालत</option>
                                    <option value="">सर्वोच्च अदालत</option>
                                    <option value="">अन्य अदालत</option>
                                    <option value="">स्थानीय तह</option>
                                    <option value="">निर्णय भइसकेको</option>
                                    <option value="">अस्वीकार गरिएको</option>
                                    
                                   </select>
                                </div>
                                <div class="col-md-12 form-group  ">
                                    <label for="" class="required">विवरण</label>
                                    <textarea class="form-control" name="" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-md-6 form-group  ">
                                    <label for="" class="required">सम्बन्धित कागजातहरू</label>
                                    <input type="file" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>
                                <div class="col-md-6 form-group  ">
                                    <label for="" class="required">अन्य संलग्न व्यक्तिहरु </label>
                                    <input type="text" name="name"
                                        class="form-control romanized rounded-0 {{ invalid_class('name') }}"
                                        value="{{ old('name') }}" autocomplete="off" required>
                                </div>

                            </div>

                            <div class="col-md-12 d-flex">
                                <div class="form-group ml-auto">
                                    <button class="btn btn-primary z-depth-0 font-18px">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>
