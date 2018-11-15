<div class="col-xs-12 col-sm-3 col-md-3 dashboard-tab">
    <img id="retailer-logo" class="img-responsive" src="https://ttdev.benefactory.in{{ $logo }}" >

    <h2 class="text-center" id="retailer-name">{{ $name }}</h2>
    <hr class="dashboard-hr">

    <p class="info-label">Contact Person:</p>
    <p class="info-content">{{ $contact_person }}</p>
    
    <p class="info-label">Email:</p>
    <p class="info-content">{{ $contact_email }}</p>
    
    <p class="info-label">Website:</p>
    <p class="info-content">{{ $website }}</p>
    <br>
    <a href="">
        <button class="btn btn-custom-orange">Edit Details</button>
    </a>
    <br>
    <a class="btn text-center btn-custom-orange" id="btn_logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </a>
</div>