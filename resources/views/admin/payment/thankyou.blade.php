@extends("layouts.app")

@section("content")

    <h2>Payment succesfull, redirecting to your dashboard...</h2>

    <script>
        setTimeout(function(){ window.location="/dashboard"; }, 5000);
    </script>

@endsection