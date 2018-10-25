@extends("designs.app")

@section("head")
    <link rel="stylesheet" href="/css/index.css">
    <link rel="stylesheet" href="/css/agreement.css">
@endsection

@section("content")
<div class="container-fluid">
    <embed id="pdf_agreement" src="{{ $agreement_path }}"> </embed>
    <div id="accept_agreement">
        <form action="{{ url()->current() }}" method="POST">
            {{ csrf_field() }}
            <input type="checkbox" id="agreed_agreement" name="agreed_agreement" value="1">I, on behalf of {{ auth()->user()->name }} accept the Terms and Conditions mentioned above.
            <br><button class="btn-custom" type="submit">Next</button>
        </form>
    </div>
</div>
@endsection