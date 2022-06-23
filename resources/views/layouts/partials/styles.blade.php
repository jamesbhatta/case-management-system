<link rel="icon" href="{{ asset(config('constants.nep_gov.logo_sm')) }}">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<link href="{{ asset('assets/mdb/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/mdb/css/mdb.min.css') }}" rel="stylesheet">
<style>
    @font-face {
        font-family: Kalimati;
        src: url("{{ asset('assets/fonts/Kalimati.ttf') }}") format('truetype');
    }

    .unicode-font {
        /* font-family: 'noto'; */
    }

    .sub-nav {
        background-color: #12213a;
    }

    .my-list{
        list-style: none;
        padding: 0;
        display: flex;
        gap: 1rem;
        margin-bottom: 0;
        padding: 1rem;
        flex-wrap: wrap
    }
    .my-list li {
        float: left;
        white-space: nowrap;
    }
    .my-list li a {
        color: inherit;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 1.1rem;
        font-weight: 500
    }
    .my-list li a.active {
        background: #1c4267;
        color: #fff;
        font-weight: 600;
    }

    .my-list li a:hover {
        background: #dae9f7;
        color: #1c2228;
    }

     .my-text{
        width: 100%;
        padding: 9px 20px;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        outline:none
    }
    @media only screen and (max-width: 1590px) {
        .btn-report button{
            width: 200px;
            position: relative;
            /* left: 1000px; */
            margin-bottom: -10px;
        }
    }
    /* .dashboard-container {
        width: 60vw;
    } */
    .cards-footer {
        background-color: rgba(255, 255, 255, 0.5);

    }

    .cards-footer label {
        cursor: pointer;
    }
</style>
<link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/utilities.css') }}">
<link href="{{ asset('assets/mdb/css/addons/datatables.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/nepali.datepicker.v3.min.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
@guest
    <link rel="stylesheet" href="{{ asset('assets/css/guest.css') }}">
@endguest
<link rel="stylesheet" href="{{ mix('css/app.css') }}">
