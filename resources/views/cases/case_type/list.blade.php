@extends('cases.detail')
@section('caseContent')
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="bg-light mt-3">
            <label class="h3 font-weight-bold mt-3 mx-4">मुद्दाको किसिम</label>
            (<b>मुद्दा नम्बर</b>: {{ $cases->case_number }})
            (<b>मुद्दा प्रकार</b>: {{ $cases->case_type }})
            (<b>मुद्दा स्थिति</b>: {{ $cases->case_status }})
            <a href="{{ route('case-type.create', $cases) }}" class="btn btn-info float-right mx-5">Add</a>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">मुद्दाको किसिम</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($caseTypes as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            {{ $item->case_type }}
                            @isset($item->personal_event)
                                ({{ $item->personal_event }})
                            @endisset
                        </td>

                        <td>
                            <a class="action-btn text-primary" href="{{ route('case-type.edit', $item) }}"><i
                                    class="far fa-edit"></i></a>
                            <form action="{{ route('case-type.destroy', $item) }}" method="post"
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
@endsection
