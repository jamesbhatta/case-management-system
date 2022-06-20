@extends('cases.detail')
@section('caseContent')
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="bg-light mt-3">
        <label class="h3 font-weight-bold mt-3 mx-4">स्थानीय तह</label>
        
        <a href="{{route('local-level.create',$cases)}}" class="btn btn-info float-right mx-5">Add</a>
       </div>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">मिति</th>
                <th scope="col">अन्यन्त्र सिफारिश </th>
                <th scope="col">अन्य संलग्न व्यक्तिहरु </th>
                <th scope="col">सम्बन्धित कागजातहरू</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consultations as $item)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->date}}</td>
                    <td>{{$item->recomandation}}</td>
                    <td>{{$item->related_people}}</td>
                    <td>{{$item->document}}</td>
                    <td>
                        <a class="action-btn text-success px-2" href=""><i
                        class="fa fa-eye"></i></a>
                        <a class="action-btn text-primary"
                            href="{{ route('local-level.edit', $item) }}"><i
                                class="far fa-edit"></i></a>
                        <form action="{{ route('local-level.destroy', $item) }}"
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