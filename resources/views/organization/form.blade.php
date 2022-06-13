@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        

        <x-organization-form :organization="$organization"></x-organization-form>
    </div>
@endsection

<script>
  $("document").ready(function(){
    setTimeout(function(){
       $(".alert").remove();
    }, 1000 ); // 3 secs

});

</script>
