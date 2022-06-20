@extends('cases.detail')
@section('caseContent')
<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
    <div class="bg-light mt-3">
        <label class="h3 font-weight-bold mt-3 mx-4">मुद्दाको किसिम</label>
        
        <a href="{{route('case-type.create',$cases)}}" class="btn btn-info float-right mx-5">Add</a>
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
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $item->case_type}}</td>
                    
                    <td>
                        <a class="action-btn text-success px-2" href=""><i
                        class="fa fa-eye"></i></a>
                        <a class="action-btn text-primary"
                            href="{{ route('case-type.edit', $item) }}"><i
                                class="far fa-edit"></i></a>
                        <form action="{{ route('case-type.destroy', $item) }}"
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