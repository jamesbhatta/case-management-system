@extends('cases.detail')
@section('caseContent')
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="bg-light mt-3">
            <label class="h3 font-weight-bold mt-3 mx-4">विपक्षको विवरणहरू</label>
            (<b>मुद्दा नम्बर</b>: {{ $cases->case_number }})
            (<b>मुद्दा प्रकार</b>: {{ $cases->case_type }})
            (<b>मुद्दा स्थिति</b>: {{ $cases->case_status }})
            <a href="{{ route('opposit-party.create', $cases) }}" class="btn btn-info float-right mx-5">Add</a>
        </div>

        <div class="overflow-auto">
            <table class="table bg-white">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">नाम</th>
                        <th scope="col">जन्म मिति </th>
                        <th scope="col">लिङ्ग</th>
                        <th>जिल्ला </th>
                        <th>नगरपालिका/गाउपालिका </th>
                        <th>वडा नम्बर </th>
                        <th>जाति</th>
                        <th>धर्म</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($oppositParties as $oppositpariy)
                        <tr>
                            <td>{{ $oppositpariy->cases_id }}</td>
                            <td>{{ $oppositpariy->first_name }} {{ $oppositpariy->last_name }}</td>
                            <td>{{ $oppositpariy->dob }}</td>
                            <td>{{ $oppositpariy->gender }}</td>
                            <td>{{ $oppositpariy->district }}</td>
                            <td>{{ $oppositpariy->municipality }}</td>
                            <td>{{ $oppositpariy->ward }}</td>
                            <td>{{ $oppositpariy->cast }}</td>
                            <td>{{ $oppositpariy->religion }}</td>
                            <td>
                                <a class="action-btn text-primary"
                                    href="{{ route('opposit-party.edit', $oppositpariy) }}"><i
                                        class="far fa-edit"></i></a>
                                <form action="{{ route('opposit-party.destroy', $oppositpariy) }}" method="post"
                                    onsubmit="return confirm('के तपाईँ निश्चित हुनुहुन्छ?')" class="form-inline d-inline">
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
@endsection
