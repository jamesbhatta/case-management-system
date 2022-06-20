@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
            <label for="" class="h3 col-12 p-3 font-weight-bold border-bottom">फैसला कार्यान्वयन</label>
            <div class="my-4">
                <form
                    action="{{ $consultation->id ? route('judgement.update', $consultation) : route('judgement.store') }}"
                    method="POST">
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
                                <input type="hidden" class="form-control p-4" name="type" value="judgement">
                            </div>
                        @endisset

                        <div class="col-lg-4 form-group">
                            <label> मिति</label>
                            <input type="text" name="date" id="input-fiscal-year-start" class="form-control fiscal-year-date p-4" value="{{ old('date', $consultation->date) }}" placeholder="Nepali YYYY-MM-DD">

                        </div>
                        <div class="col-lg-4 form-group">
                            <label> अन्यन्त्र सिफारिश </label>
                            <input type="text" class="form-control p-4" name="recomandation"
                                value="{{old('recomandation',$consultation->recomandation)}}">

                        </div>
                        <div class="col-lg-12 form-group">
                            <label> विवरण</label>
                            <textarea class="form-control" name="description" id="" cols="30" rows="10">
                                {{old('description',$consultation->description)}}
                            </textarea>
                            

                        </div>
                        <div class="col-lg-6 form-group">
                            <label> सम्बन्धित कागजातहरू</label>
                            <input type="file" class="form-control p-3" style="height: 50px" name="document"
                                value="{{ old('document',$consultation->document)}}">

                        </div>
                        <div class="col-lg-6 form-group">
                            <label> अन्य संलग्न व्यक्तिहरु </label>
                            <input type="text" class="form-control p-4" name="related_people"
                                value="{{  old('related_people',$consultation->related_people)}}">

                        </div>
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

</script>
@endpush

