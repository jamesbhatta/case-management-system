@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" id="txt2" aria-current="page">मुद्दा अभिलेख</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>




        <div class="card z-depth-0">
            <div class="card-header">
                <div style="overflow: auto;scrollbar-width: none;">
                    <div>
                        <nav class="nav nav-pills" id="pills-tab" role="tablist">
                            <h4> नयाँ मुद्दा अभिलेख     थप्नुहोस्</h4>
                           

                        </nav>
                    </div>
                </div>

            </div>


        </div>

        <div class="card z-depth-0">
            <div class="card-body ">


                <div class="tab-content" id="pills-tabContent">
                    {{-- ================================================मुद्दा अभिलेख===================================== --}}
                    {{-- <x-case></x-case> --}}
                    <div class="tab-pane fade show active" id="pills-case" role="tabpanel" aria-labelledby="pills-home-tab">
                        <form action="{{$cases->id ? route('cases.update',$cases) :route('cases.store') }} " class="form" method="post">
                            @csrf
                            @isset($cases->id)
                                @method('PUT')
                            @endisset
                            <div class="row">
                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">*क्रम संख्या</label>
                                    <input type="text" name="serial_number" class="form-control romanized rounded-0"
                                        value="{{ old('serial_number',$cases->serial_number) }}">
                                    <x-invalid-feedback field="name"></x-invalid-feedback>
                                </div>

                                <div class="col-md-3 form-group  ">
                                    <label for="" class="required">*मुद्दा नं. </label>
                                    <input type="text" name="case_number" class="form-control romanized rounded-0"
                                        value="{{ old('case_number',$cases->case_number) }}">
                                    <x-invalid-feedback field="type"></x-invalid-feedback>
                                </div>



                                <div class="col-md-3   form-group">
                                    <label for="">*मिति</label>
                                    <input type="text" name="date" id="input-fiscal-year-start"
                                        class="form-control nepali-date" value="{{ old('date',$cases->date) }}"
                                        placeholder="Nepali YYYY-MM-DD">

                                </div>

                                <div class="col-md-3   form-group">
                                    <label for="">*मुद्दाको स्थिति</label>
                                    <select class="form-control" name="case_status" id="">
                                        @isset($cases->id)
                                            <option value="{{$cases->case_status}}" selected>{{$cases->case_status}}</option>
                                            @else
                                            
                                            <option value="" disabled selected>मुद्दाको स्थिति चयन गर्नुहोस्</option>
                                        @endisset
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
                                    <button class="btn btn-info z-depth-0" style="font-size: 15px">{{$cases->id ? 'मुद्दा अपडेट गर्नुहोस्':'मुद्दा दर्ता गर्नुहोस्'}}</button>
                                </div>
                            </div>
                        </form>

                       
                    </div>


                </div>

            </div>

        </div>


    </div>
@endsection

<script>
    $("document").ready(function() {
        setTimeout(function() {
            $(".alert").remove();
        }, 1000); // 3 secs

    });

    // function btn_clicked(text) {
    //     document.getElementById("txt1").innerHTML = text;
    //     document.getElementById("txt2").innerHTML = text;
    //     // ("helloo");
    // }
</script>
