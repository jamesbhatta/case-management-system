@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
            <div class="bg-light mt-3">
                <label class="h3 font-weight-bold mt-3 mx-4">परामर्श</label>
                (<b>मुद्दा नम्बर</b>: {{ $cases->case_number }})
                (<b>मुद्दा प्रकार</b>: {{ $cases->case_type }})
                (<b>मुद्दा स्थिति</b>: {{ $cases->case_status }})
                {{-- <a href="{{ route('rejected.create', $cases) }}" class="btn btn-info float-right mx-5">Add</a> --}}
            </div>
            <div class="my-4">
                <form
                    action="{{ $consultation->id ? route('consultation.update', $consultation) : route('consultation.store') }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @isset($consultation->id)
                        @method('PUT')
                    @endisset
                    <div class="row">
                        @isset($consultation->id)
                        @else
                            <div class="col-lg-4 form-group">
                                <label> मुद्दा नं.</label>
                                <input type="text" class="form-control p-4" name="" value="{{ $cases->case_number }}"
                                    disabled>
                                <input type="hidden" class="form-control p-4" name="cases_id" value="{{ $cases->id }}">
                                <input type="hidden" class="form-control p-4" name="type" value="pramarsh">
                            </div>
                        @endisset

                        <div class="col-lg-4 form-group">
                            <label> मिति</label>
                            <input type="text" name="date" id="input-fiscal-year-start"
                                class="form-control fiscal-year-date p-4" value="{{ old('date', $consultation->date) }}"
                                placeholder="Nepali YYYY-MM-DD">

                        </div>
                        <div class="col-lg-4 form-group">
                            <label> अन्यन्त्र सिफारिश </label>
                            <input type="text" class="form-control p-4" name="recomandation"
                                value="{{ old('recomandation', $consultation->recomandation) }}">

                        </div>
                        <div class="col-lg-12 form-group">
                            <label> विवरण</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">
                                {{ old('description', $consultation->description) }}
                            </textarea>


                        </div>
                        {{-- <div class="col-lg-6 form-group">
                            <label> सम्बन्धित कागजातहरू</label>
                            <input type="file" class="form-control p-3" style="height: 50px" name="document"
                                value="{{ old('document', $consultation->document) }}">

                        </div> --}}
                        <div class="col-lg-12 form-group">
                            <label> अन्य संलग्न व्यक्तिहरु </label>
                            <input type="text" class="form-control p-4" name="related_people"
                                value="{{ old('related_people', $consultation->related_people) }}">

                        </div>
                        {{-- <div class="col-lg-6 form-group">
                            
                            <a href="#" class="btn btn-info">सम्बन्धित कागजातहरू थप्नुहोस्</a>
                        </div> --}}
                        {{-- <div class="col-lg-12">
                            <label>परामर्श सम्बन्धित कागजात</label>

                            <input type="file" class="form-control p-4">


                        </div> --}}
                        {{-- <div id="new_chq" class="col-lg-12"></div>
                        <input type="hidden" value="1" id="total_chq">
                        <a href="#" class="btn btn-success mt-3 ml-3" onclick="add()"><i class="fa fa-plus"></i></a>
                        <a href="#" class="btn btn-success mt-3" onclick="remove()"><i class="fa fa-trash"></i></a> --}}



                    </div>
                    <input type="submit" name="" id="" class="btn btn-info" value="Submiit">

            </div>
            </form>


        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(function() {
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })

        function add() {
            var new_chq_no = parseInt($('#total_chq').val()) + 1;
            var new_input = "<input type='file' class='form-control p-4 mt-3' id='new_" + new_chq_no + "'>";
            $('#new_chq').append(new_input);
            $('#total_chq').val(new_chq_no)
        }

        function remove() {
            var last_chq_no = $('#total_chq').val();
            if (last_chq_no > 1) {
                $('#new_' + last_chq_no).remove();
                $('#total_chq').val(last_chq_no - 1);
            }
        }
    </script>
@endpush
