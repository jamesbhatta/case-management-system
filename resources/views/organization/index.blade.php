@extends('layouts.app')

@section('content')
    <h3 class="font-weight-bold">Manage Organization</h3>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
            <li class="breadcrumb-item active" aria-current="page">Organizations</li>
            <li class="breadcrumb-item active" aria-current="page">Manage</li>
        </ol>
    </nav>
    <div class="container">
        @include('alerts.all')
    </div>

    <div class="container-flluid">

        <div class="card z-depth-0 font-noto">
            <div class="card-header">
                <div class="row">
                    {{-- <div class="input-group mb-3 col-lg-3">
                        <div class="custom-file">
                            <input type="text" class="form-control" id="inputGroupFile02">
                        </div>
                        <div class="input-group-append">
                            <input type="submit" class="input-group-text" value="Search">

                        </div>
                    </div> --}}
                    <div class="col">
                        <a href="{{route('organization.create')}}" class="btn btn-info float-right"> <i class="fa fa-home"></i> Add</a>
                    </div>
                </div>
            </div>
            <table class="table table-hover table-borderless">
                <thead class="thead-light">
                    <tr>
                        <th>Organization name</th>
                        <th>District</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>FAX</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($organizations as $organization)
                        <tr >
                            <td>{{ $organization->name }}</td>
                            <td>{{ $organization->district }}</td>
                            <td>{{ $organization->address }}</td>
                            <td>{{ $organization->phone }}</td>
                            <td>{{ $organization->email }}</td>
                            <td>{{ $organization->fax }}</td>
                            <td>
                                <div class="d-flex">
                                        <a href="{{ route('organization.edit', $organization) }}" class="action-btn text-primary"><i class="far fa-edit"></i></a>
                                    <form action="{{ route('organization.destroy', $organization) }}" method="POST"
                                        class="d-inline" onsubmit="return confirm('Sure to trash?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="action-btn text-danger"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white">
                            <td colspan="42" class="text-center">No Records Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
