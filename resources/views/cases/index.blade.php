@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">मुद्दा अभिलेख</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                            <a class="nav-link text-dark active" onclick="btn_clicked('मुद्दा अभिलेख')" id="pills-home-tab"
                                data-bs-toggle="pill" href="#pills-case" role="tab" aria-controls="pills-home"
                                aria-selected="true">मुद्दा अभिलेख</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('पक्षको विवरण')" id="pills-profile-tab"
                                data-bs-toggle="pill" href="#pills-party_details" role="tab" aria-controls="pills-profile"
                                aria-selected="false">पक्षको विवरण</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('विपक्षको विवरण')" id="pills-profile-tab"
                                data-bs-toggle="pill" href="#pills-opposit_party_details" role="tab"
                                aria-controls="pills-profile" aria-selected="false">विपक्षको विवरण</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('वारिस')" id="pills-profile-tab"
                                data-bs-toggle="pill" href="#pills-relations" role="tab" aria-controls="pills-profile"
                                aria-selected="false">वारिस</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('मुद्दाको किसिम')" id="pills-profile-tab"
                                data-bs-toggle="pill" href="#pills-case_type" role="tab" aria-controls="pills-profile"
                                aria-selected="false">मुद्दाको किसिम</a>
                            <a class="nav-link text-dark" onclick="btn_clicked('कानूनी सेवा')" id="pills-profile-tab"
                                data-bs-toggle="pill" href="#pills-consultation" role="tab" aria-controls="pills-profile"
                                aria-selected="false">कानूनी सेवा</a>
                            {{-- <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill"
                                href="#pills-consultation" role="tab" aria-controls="pills-profile"
                                aria-selected="false">परामर्श</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">सहजीकरण</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">मस्यौदा</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">बहस</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">मेलमिलाप</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">फैसला कार्यान्वयन</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">प्रहरी कार्यालय</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">जिल्ला अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">उच्च अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">सर्वोच्च अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">अन्य अदालत</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">स्थानीय तह</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">निर्णय भइसकेको</a>
                            <a class="nav-link text-dark" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile"
                                role="tab" aria-controls="pills-profile" aria-selected="false">अस्वीकार गरिएको</a> --}}

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

                        <div class="card z-depth-0 my-5">
                            <div class="card-header">
                                <h5 class="my-2">मुद्दा अभिलेख विवरण</h5>
                            </div>
                            <div class="card-body">


                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            {{-- <th scope="col">#</th> --}}
                                            <th scope="col">क्रम संख्या</th>
                                            <th scope="col">मुद्दा नं. </th>
                                            <th scope="col">मिति</th>
                                            <th scope="col">मुद्दाको स्थिति</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($allCases as $item)
                                            <tr>
                                                {{-- <td>{{ $loop->iteration }}</td> --}}
                                                <td>{{ $item->serial_number }}</td>
                                                <td>{{ $item->case_number }}</td>
                                                <td>{{ $item->date }}</td>
                                                <td>{{ $item->case_status }}</td>
                                                <td>
                                                    <a class="action-btn text-primary" href="{{route('cases.edit',$item)}}"><i
                                                            class="far fa-edit"></i></a>
                                                    <form action="{{ route('cases.destroy', $item) }}" method="post"
                                                        onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')"
                                                        class="form-inline d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="action-btn text-danger"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                    {{-- ==============================================पक्षको विवरण विवरण =================================== --}}

                    <x-party_details></x-party_details>
                    {{-- ============================================विपक्षको विवरण============================================= --}}
                    <x-opposit_party_details></x-opposit_party_details>

                    {{-- ======================================पक्ष र विपक्ष बिचको सम्बन्ध/वारिस ========================================= --}}
                    <x-relations></x-relations>

                    {{-- ============================================मुद्दाको किसिम============================================= --}}
                    <x-case_type></x-case_type>
                    {{-- ============================================परामर्श============================================= --}}
                    <x-consultation></x-consultation>
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

    function btn_clicked(text) {
        document.getElementById("txt1").innerHTML = text;
        document.getElementById("txt2").innerHTML = text;
        // ("helloo");
    }
</script>
