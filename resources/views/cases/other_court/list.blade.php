@extends('cases.detail')
@section('caseContent')
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div class="bg-light mt-3">
            <label class="h3 font-weight-bold mt-3 mx-4">अन्य अदालत</label>

            <a href="{{ route('other-court.create', $cases) }}" class="btn btn-info float-right mx-5">Add</a>
        </div>
        <div class="overflow-auto">
            <table class="table bg-white">
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->date }}</td>
                            <td>{{ $item->recomandation }}</td>
                            <td>{{ $item->related_people }}</td>
                            <td>
                                @if ($item->document)
                                    <a href="{{ url('document') }}{{ '/' }}{{ $item->document }}"
                                        class="btn btn-success">Download</a>
                                @endif

                            </td>
                            <td>
                                <a class="action-btn text-primary" href="{{ route('document.index', $item) }}">
                                    <i class="far fa-file"></i>
                                </a>
                                <a class="action-btn text-primary" href="{{ route('other-court.edit', $item) }}"><i
                                        class="far fa-edit"></i></a>
                                <form action="{{ route('other-court.destroy', $item) }}" method="post"
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
