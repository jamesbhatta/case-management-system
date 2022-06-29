@extends('cases.detail')
@section('caseContent')
    <div class="card z-depth-0">
        <div class="card-body">
            <label for="" class="h3 col-12 p-3 font-weight-bold border-bottom">{{$value}}  सम्बन्धित कागजात</label>
            <div class="my-4">
                <form action="{{route('document.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-12 form-group">
                    
                        <input type="file" class="form-control p-3" style="height: 50px" name="document"
                            value="">



                    </div>
                    <input type="hidden" name="consultations_id" value="{{$consultation->id}}">
                    <input type="hidden" name="type" value="{{$value}}">
                    <input type="submit" name="" id="" class="btn btn-info" value="Upload">

                </form>


            </div>
        </div>
    </div>

    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="bg-light mt-3">
            <label class="h3 font-weight-bold mt-3 mx-4">{{$value}} सम्बन्धित कागजातहरू</label>

        </div>
        <div class="overflow-auto">
            <table class="table bg-white">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">सम्बन्धित कागजात</th>
                        <th scope="col">Download </th>
                       
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->document }}</td>
                            
                            <td>
                                @if ($item->document)
                                    <a href="{{ url('document') }}{{ '/' }}{{ $item->document }}" style="height: 20pc;width:30px"><i class="fa fa-download" aria-hidden="true"></i></a>
                                @endif

                            </td>
                           
                            <td>
                                <form action="{{ route('document.destroy', $item) }}" method="post"
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
@push('scripts')
    <script>
        $(function() {
            if ($('.fiscal-year-date')[0]) {
                $('.fiscal-year-date').nepaliDatePicker({});
            }

        })
    </script>
@endpush
