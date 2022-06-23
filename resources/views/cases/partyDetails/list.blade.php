@extends('cases.detail')
@section('caseContent')
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
   <div class="bg-light mt-3">
    <label class="h3 font-weight-bold mt-3 mx-4">पक्षको विवरणहरू</label>
    <a href="{{route('partydetail.create',$cases)}}" class="btn btn-info float-right mx-5">Add</a>
   </div>
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
            @foreach ($partyDetails as $item)
                 <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                    <td>{{ $item->dob }}</td>
                    <td>{{ $item->gender }}</td>
                    <td>{{ $item->district }}</td>
                    <td>{{ $item->municipality }}</td>
                    <td>{{ $item->ward }}</td>
                    <td>{{ $item->cast }}</td>
                    <td>{{ $item->religion }}</td>
                    <td> 
                        <a class="action-btn text-primary"
                            href="{{ route('partydetail.edit', $item) }}"><i
                                class="far fa-edit"></i></a>
                        <form action="{{ route('partydetail.destroy', $item) }}"
                            method="post"
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
@endsection