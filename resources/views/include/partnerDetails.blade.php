<div class="col-md-2 dashboard-list">
    <div class="partner-logo">
        <img id="partner-logo" class="img-responsive" src="https://ttdev.benefactory.in<?php echo $logo;?>">
    </div>

    <div class="partner-info">
        <p id="partner-name"><b><?php echo $name; ?></b></p>
        <hr class="info-break">
        Contact Person: <p id="partner-contact-person"><b><?php echo $contact_person; ?></b></p>
        Email: <p id="partner-contact-email"><b><?php echo $contact_email; ?></b></p>
        Website: <p id="partner-website"><b><a href="<?php echo $website; ?>"><?php echo $website; ?></a></b></p>
    </div>
    
    <a class="btn text-center" id="btn_logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        Logout
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </a>
</div>