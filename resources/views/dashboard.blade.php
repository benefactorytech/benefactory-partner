@extends('designs.app')

@section('head')
     <link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')
<!--
<div class="container">
     <div class="card col-md-4 dashboard-card">
          <h4 class="text-center">Make Payment</h4>
     </div>
     <div class="card col-md-4 dashboard-card">
          <h4 class="text-center">Partner Details</h4>
     </div>
     <div class="card col-md-4 dashboard-card">
          <h4 class="text-center">Payment History</h4>
     </div>
</div>
-->

<div class="container">
    <div class="row">
        <div class="col-md-2 dashboard-list">

            <div class="partner-logo">
                <img id="partner-logo" class="img-responsive" src="https://www.benefactory.in<?php echo $logo;?>">
            </div>

            <div class="partner-info">
                <p id="partner-name"><b><?php echo $name; ?></b></p>
                <hr class="info-break">
                Contact Person: <p id="partner-contact-person"><b><?php echo $contact_person; ?></b></p>
                Email: <p id="partner-contact-email"><b><?php echo $contact_email; ?></b></p>
                Website: <p id="partner-website"><b><a href="<?php echo $website; ?>"><?php echo $website; ?></a></b></p>
            </div>
        </div>

        <div class="col-md-10 dashboard-body">
            <div class="row">
                <a href="/card-payment">
                    <div class="col-md-4 dashboard-card">
                        <p class="dashboard-card-title">Make payment</p>
                    </div>
                </a>

                <div class="col-md-4 dashboard-card">
                    <p class="dashboard-card-title">Payment history</p>
                </div>

                <div class="col-md-4 dashboard-card">
                    <p class="dashboard-card-title">Customer transaction log</p>
                </div>
            </div>
            <hr class="info-break">
            <div id="customer-transaction-log">
                <div>
                    <p class="dashboard-card-title">Recent customer transactions</p>
                </div>

                <table id="customer-transaction-table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Transaction ID</th>
                        </tr>
                        <?php
                            $contributions = $contribution_log['contribution_log'];
                            foreach($contributions as $contribution){
                                echo '<tr><td>' . $contribution->customer_name . '</td><td>' . $contribution->customer_email . '</td><td>' . $contribution->amount . '</td><td>' . $contribution->transaction_id . '</td></tr>';
                            }                        
                        ?>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
