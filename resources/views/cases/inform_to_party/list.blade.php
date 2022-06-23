@extends('cases.detail')
@section('caseContent')
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="bg-light mt-3">
        <label class="h3 font-weight-bold mt-3 mx-4">पक्षलाई जानकारी</label>
        
        <a href="{{route('inform-to-party.create',$cases)}}" class="btn btn-info float-right mx-5">Add</a>
       </div>
    <table class="table bg-white">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">पक्ष र विपक्ष  बिचको सम्बन्ध</th>
                <th scope="col"> पक्षलाई  जानकारी?</th>
                <th scope="col">वारिस</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($informToParties as $oppositpariy)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $oppositpariy->relation}}</td>
                    <td>{{ $oppositpariy->info}}</td>
                    <td>{{ $oppositpariy->heir_name}}</td>
                    
                    <td>
                        <a class="action-btn text-success px-2" href=""><i
                        class="fa fa-eye"></i></a>
                        <a class="action-btn text-primary"
                            href="{{ route('inform-to-party.edit', $oppositpariy) }}"><i
                                class="far fa-edit"></i></a>
                        <form action="{{ route('inform-to-party.destroy', $oppositpariy) }}"
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