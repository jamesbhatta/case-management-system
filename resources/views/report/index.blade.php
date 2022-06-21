@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h3 class="font-weight-bold my-3" id="txt1">रिपोर्ट</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                {{-- <li class="breadcrumb-item"><a href="#"></a></li> --}}
                <li class="breadcrumb-item active" id="txt2" aria-current="page">रिपोर्ट</li>
            </ol>
        </nav>
        <div class="container">
            @include('alerts.all')
        </div>




        <div class="card z-depth-0">
            <div class="card-header">
                <form action="" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-1">
                            <input type="text" class="form-control" placeholder="मुद्दा नं.">
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="मिति">
                        </div>

                        <div class="col-md-2">
                            <input type="text" class="form-control" placeholder="मुद्दाको स्थिति">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card z-depth-0">
            <div class="card-body ">
            </div>

        </div>


    </div>
@endsection

<script>
    $("document").ready(function() {
        setTimeout(function() {
            $(".alert").remove();
        }, 1000); // 3 secs

    });

    // function btn_clicked(text) {
    //     document.getElementById("txt1").innerHTML = text;
    //     document.getElementById("txt2").innerHTML = text;
    //     // ("helloo");
    // }
</script>
