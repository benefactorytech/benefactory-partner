@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/dashboard.css">
@endsection

@section('content')
<div class="container">
    <div class="row">
        @include("include.partnerDetails")

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
                    <p class="dashboard-card-title">Recent customer Donations</p>
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
