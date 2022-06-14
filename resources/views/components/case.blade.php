<div class="tab-pane fade show active" id="pills-case" role="tabpanel" aria-labelledby="pills-home-tab">
    <form action="{{route('cases.store')}}" class="form" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-3 form-group  ">
                <label for="" class="required">*क्रम संख्या</label>
                <input type="text" name="serial_number" class="form-control romanized rounded-0" value="{{ old('serial_number') }}">
                <x-invalid-feedback field="name"></x-invalid-feedback>
            </div>

            <div class="col-md-3 form-group  ">
                <label for="" class="required">*मुद्दा नं. </label>
                <input type="text" name="case_number" class="form-control romanized rounded-0" value="{{ old('case_number') }}">
                <x-invalid-feedback field="type"></x-invalid-feedback>
            </div>



            <div class="col-md-3   form-group">
                <label for="">*मिति</label>
                <input type="text" name="date" id="input-fiscal-year-start" class="form-control nepali-date" value="{{old('date')}}" placeholder="Nepali YYYY-MM-DD">

            </div>

            <div class="col-md-3   form-group">
                <label for="">*मुद्दाको स्थिति</label>
                <select class="form-control" name="case_status" id="">
                    <option value="" disabled selected>मुद्दाको स्थिति चयन गर्नुहोस्</option>
                    <option value="परामर्श">परामर्श</option>
                    <option value="सहजीकरण">सहजीकरण</option>
                    <option value="मस्यौदा">मस्यौदा</option>
                    <option value="बहस">बहस</option>
                    <option value="मेलमिलाप">मेलमिलाप</option>
                    <option value="फैसला कार्यान्वयन">फैसला कार्यान्वयन</option>
                    <option value="प्रहरी कार्यालय">प्रहरी कार्यालय</option>
                    <option value="जिल्ला अदालत">जिल्ला अदालत</option>
                    <option value="उच्च अदालत">उच्च अदालत</option>
                    <option value="सर्वोच्च अदालत">सर्वोच्च अदालत</option>
                    <option value="अन्य अदालत">अन्य अदालत</option>
                    <option value="स्थानीय तह">स्थानीय तह</option>
                    <option value="निर्णय भइसकेको">निर्णय भइसकेको</option>
                    <option value="अस्वीकार गरिएको">अस्वीकार गरिएको</option>
                </select>
            </div>


        </div>

        <div class="col-md-12 d-flex">
            <div class="form-group ml-auto">
                <button class="btn btn-info z-depth-0" style="font-size: 15px">मुद्दा दर्ता गर्नुहोस्</button>
            </div>
        </div>
    </form>

    <div class="card z-depth-0 my-5">
        <div class="card-header">
            <h5 class="my-2">मुद्दा अभिलेख विवरण</h5>
        </div>
        <div class="card-body">
            

            <table class="table">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">क्रम संख्या</th>
                    <th scope="col">मुद्दा नं. </th>
                    <th scope="col">मिति</th>
                    <th scope="col">मुद्दाको स्थिति</th>
                  </tr>
                </thead>
                <tbody>
                    
                    {{-- @foreach ($allCases as $item)
                    <td>{{$item->serial_number}}</td>    
                    @endforeach --}}
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  
                </tbody>
              </table>
            
        </div>
    </div>  
</div>
