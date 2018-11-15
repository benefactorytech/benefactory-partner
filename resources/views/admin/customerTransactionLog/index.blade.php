@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/transactionlog.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include("include.partnerDetails")

        <div class="col-xs-12 col-sm-9 col-md-9">
            <div class="">
                <a class="btn btn-custom-orange" style="width: auto;" href="/dashboard">Go back: Dashboard</a>
            </div>
            <div id="customer-transaction-log">
                <a class="btn page-links" href="/admin/customertransactionlog?page={{ $contribution_log->current_page + 1 }}">Next page</a>
                <?php
                    $last_page = $contribution_log->last_page;
                    $current_page = 1;

                    while($current_page <= $last_page){
                        if( $contribution_log->current_page == $current_page ){
                            $str = <<<EOD
                            <a class='btn page-links active' href='/admin/customertransactionlog?page=$current_page'>$current_page</a>
EOD;
                        }else{
                            $str = <<<EOD
                            <a class='btn page-links' href='/admin/customertransactionlog?page=$current_page'>$current_page</a>
EOD;
                        }
                        echo $str;
                        $current_page += 1;
                    }
                ?>
                <table id="customer-transaction-table">
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Amount</th>
                            <th>Transaction ID</th>
                        </tr>
                        <?php
                            $contributions = $contribution_log->data;
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
