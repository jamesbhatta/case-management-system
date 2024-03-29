@extends('cases.detail')
@section('caseContent')
   

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
                                {{-- <a href="{{ url('storage/app/documents/'.$item->document) }}">Download</a> --}}
                                    <a href="{{ Storage::url($item->document)}}" style="height: 20px;width:30px"><i class="fa fa-download" aria-hidden="true"></i></a>
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
