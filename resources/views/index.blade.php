@extends("layouts.appWithoutNav")

@section("head")
    <link rel="stylesheet" href="/css/index.css">
@endsection

@section("content")
<div class="white">
    <div class="retailer-section">
        <img class="background-image" src="/images/aboutus-brand2.png" />
        <div class="retailer-section-content">
            <h1 class="title">E-Brands</h1>
            <hr class="sep" id="hr-break">
            <h4 class="tagline">Let's redefine everything</h4>
            <p class="content">
                The ACT NOW movement enables any disruptive company to become a platform for change.<br><br>
                We engage brands, no matter how big or small, to join forces and make unimaginable changes by harnessing consumer actions.<br><br>
                As soon as a crisis arises, you can be part of the change almost immediately. No hassles of planning campaigns and no delays in executing them.
            </p>
            <a class="btn btn-custom-index" href="/login">Login</a>
            <a class="btn btn-custom-index" href="/register">Sign up Now</a>
        </div>
    </div>
</div>
@endsection