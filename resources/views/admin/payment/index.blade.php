@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/transactionlog.css">
    <link rel="stylesheet" href="/css/payment.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include("include.partnerDetails")

        <div class="col-xs-12 col-sm-9 col-md-9">
            <div class="">
                <a class="btn btn-custom-orange" style="width: auto;" href="/dashboard">Go back: Dashboard</a>
            </div>

            <div class="payment-dashboard" id="payment-dashboard">
                    <div class="status-holder">
                        <div class="status-content">
                            
                        </div>
                        <p>Total customer transactions</p>
                    </div>

                    <div class="status-holder">
                        <div class="status-content" id="total-transaction-amount">
                        </div>
                        <p>Total transaction amount</p>
                    </div>

                    <div class="status-holder">
                        <div class="status-content" id="current-product-price">
                            {{ $donation_amount }}
                        </div>
                        <p>Current product price</p>
                    </div>

                    <div class="status-holder">
                        <div class="status-content">
                        </div>
                        <p>Total donatable amount</p>
                    </div>

                    <div class="status-holder">
                        <div class="status-content">
                        </div>
                        <p>Previously donated</p>
                    </div>

                    <div class="status-holder">
                        <div class="status-content">
                        </div>
                        <p>Date of previous donation</p>
                    </div>

                    <div class="status-holder">
                        <a href="/admin/payment/do" class="btn action-button">Donate now</a>
                        <a href="" class="btn action-button">Donation Certificates</a>
                    </div>
            </div>

            <div id="customer-transaction-log">
                <table id="customer-transaction-table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Transaction ID</th>
                            <th>Date</th>
                        </tr>
                        <?php
                            $contributions = $contribution_log->data;
                            foreach($contributions as $contribution){
                                echo '<tr><td>' . $contribution->customer_name . '</td><td>' . $contribution->customer_email . '</td><td>' . $contribution->amount . '</td><td>' . $contribution->transaction_id . '</td><td>' . $contribution->created_at . '</td></tr>';
                            }                        
                        ?>
                </table>

                <div class="links">
                    <a class="btn page-links" href="/admin/payment?page={{ $contribution_log->current_page + 1 }}">Next page</a>
                <?php
                    $last_page = $contribution_log->last_page;
                    $current_page = 1;

                    while($current_page <= $last_page){
                        if( $contribution_log->current_page == $current_page ){
                            $str = <<<EOD
                            <a class='btn page-links active' href='/admin/payment?page=$current_page'>$current_page</a>
EOD;
                        }else{
                            $str = <<<EOD
                            <a class='btn page-links' href='/admin/payment?page=$current_page'>$current_page</a>
EOD;
                        }
                        echo $str;
                        $current_page += 1;
                    }
                ?>
                </div>
            </div>
        </div>

        
    </div>
</div>
@endsection
