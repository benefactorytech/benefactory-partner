@extends('layouts.app')

@section('head')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/integration.css">
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        @include("include.partnerDetails")

        <div class="col-sm-9 col-md-9">
            <div class="integration-tab">
                <button class="btn-tab" id="shopify">Shopify</button>
                <button class="btn-tab" id="magento">Magento</button>
                <button class="btn-tab" id="woocom">WooCommerce</button>
            </div>

            <div class="content-container">
                <div class="integration-content" id="shopify-content" style="">
                <h3 class="title">Shopify</h3>
                    <p>Follow the steps to integrate</p>

                    <ol>
                        <li>Add Benefactory product</li>
                        <li>In Product data, select "virtual product" option and from the General tab, enter the amount in the regular price input section</li>
                        <li>Click on Inventory, make sure the "sku" is "benefactory_donation"</li>
                        <li>Also, remember to check the “sold individually” section. It should look something like this<br>
                            <img class="screenshot" src="/images/woocom-1.png">
                        </li>
                        <li>Now from the left menu tab, click on Products->All Products</li>
                        <li>Search for the Benefactory product you just created and note down the ID
                            <br><img class="screenshot" src="/images/woocom-2.png">
                        </li>
                        <li>Step 1: Log in to your wordpress account and make sure you have the plugin called "Beaver Builder" installed</li>
                        <li>Step 2: After installation of "Beaver Builder", activate the plugin</li>
                        <li>Step 3: Go to Pages and click on "cart". Select the Beaver Builder option.
                            <br><img class="screenshot" src="/images/woocom-3.png">
                        </li>
                        <li>Once on the page, click on the "+" symbol, drag and drop "<> HTML" wherever you’d like the Benefactory checkbox to be, preferably above the cart items
                            <br><img class="screenshot" src="/images/woocom-4.png">
                        </li>
                        <li>When the dialog box appears, just paste the following code into it
                            <br><img class="screenshot" src="/images/woocom-5.png">
                        </li>
                        <br>
                            <textarea class="code">
<div>
    <iframe style='width: 400px'
                    frameborder='0' 
                    scrolling='no' 
                    height='120px' 
                    src='https://ttstaging.benefactory.in/admin/widgets/retailers/1'>
    </iframe>
</div>
<a id="bf_contribution_link" href="/cart?add-to-cart=57">
    <input type="checkbox" id="bf_contribution" />
</a>
<label for="contribution">Contribute Rs. 5 to <a target="_blank" href="http://www.benefactory.in">Benefactory</a></label>

                            </textarea>
                        
                    </ol>
                </div>

                <div class="integration-content" id="magento-content" style="display: none;">
                <h3 class="title">Magento</h3>
                    <p>Follow the steps to integrate</p>

                    <ol>
                        <li>Add Benefactory product</li>
                        <li>In Product data, select "virtual product" option and from the General tab, enter the amount in the regular price input section</li>
                        <li>Click on Inventory, make sure the "sku" is "benefactory_donation"</li>
                        <li>Also, remember to check the “sold individually” section. It should look something like this<br>
                            <img class="screenshot" src="/images/woocom-1.png">
                        </li>
                        <li>Now from the left menu tab, click on Products->All Products</li>
                        <li>Search for the Benefactory product you just created and note down the ID
                            <br><img class="screenshot" src="/images/woocom-2.png">
                        </li>
                        <li>Step 1: Log in to your wordpress account and make sure you have the plugin called "Beaver Builder" installed</li>
                        <li>Step 2: After installation of "Beaver Builder", activate the plugin</li>
                        <li>Step 3: Go to Pages and click on "cart". Select the Beaver Builder option.
                            <br><img class="screenshot" src="/images/woocom-3.png">
                        </li>
                        <li>Once on the page, click on the "+" symbol, drag and drop "<> HTML" wherever you’d like the Benefactory checkbox to be, preferably above the cart items
                            <br><img class="screenshot" src="/images/woocom-4.png">
                        </li>
                        <li>When the dialog box appears, just paste the following code into it
                            <br><img class="screenshot" src="/images/woocom-5.png">
                        </li>
                        <br>
                            <textarea class="code">
<div>
    <iframe style='width: 400px'
                    frameborder='0' 
                    scrolling='no' 
                    height='120px' 
                    src='https://ttstaging.benefactory.in/admin/widgets/retailers/1'>
    </iframe>
</div>
<a id="bf_contribution_link" href="/cart?add-to-cart=57">
    <input type="checkbox" id="bf_contribution" />
</a>
<label for="contribution">Contribute Rs. 5 to <a target="_blank" href="http://www.benefactory.in">Benefactory</a></label>

                            </textarea>
                        
                    </ol>
                </div>

                <div class="integration-content" id="woocom-content" style="display:none;">
                    <h3 class="title">WooCommerce</h3>
                    <p>Follow the steps to integrate</p>

                    <ol>
                        <li>Add Benefactory product</li>
                        <li>In Product data, select "virtual product" option and from the General tab, enter the amount in the regular price input section</li>
                        <li>Click on Inventory, make sure the "sku" is "benefactory_donation"</li>
                        <li>Also, remember to check the “sold individually” section. It should look something like this<br>
                            <img class="screenshot" src="/images/woocom-1.png">
                        </li>
                        <li>Now from the left menu tab, click on Products->All Products</li>
                        <li>Search for the Benefactory product you just created and note down the ID
                            <br><img class="screenshot" src="/images/woocom-2.png">
                        </li>
                        <li>Step 1: Log in to your wordpress account and make sure you have the plugin called "Beaver Builder" installed</li>
                        <li>Step 2: After installation of "Beaver Builder", activate the plugin</li>
                        <li>Step 3: Go to Pages and click on "cart". Select the Beaver Builder option.
                            <br><img class="screenshot" src="/images/woocom-3.png">
                        </li>
                        <li>Once on the page, click on the "+" symbol, drag and drop "<> HTML" wherever you’d like the Benefactory checkbox to be, preferably above the cart items
                            <br><img class="screenshot" src="/images/woocom-4.png">
                        </li>
                        <li>When the dialog box appears, just paste the following code into it
                            <br><img class="screenshot" src="/images/woocom-5.png">
                        </li>
                        <br>
                            <textarea class="code">
<div>
    <iframe style='width: 400px'
                    frameborder='0' 
                    scrolling='no' 
                    height='120px' 
                    src='https://ttstaging.benefactory.in/admin/widgets/retailers/1'>
    </iframe>
</div>
<a id="bf_contribution_link" href="/cart?add-to-cart=57">
    <input type="checkbox" id="bf_contribution" />
</a>
<label for="contribution">Contribute Rs. 5 to <a target="_blank" href="http://www.benefactory.in">Benefactory</a></label>

                            </textarea>
                        
                    </ol>

                </div>
            </div>
        </div> 
    </div>
</div>

<script>
    $(document).ready(function(){
        $("#shopify").click(function(){
            $("#shopify-content").css("display", "block");
            $("#magento-content").css("display", "none");
            $("#woocom-content").css("display", "none");
        });
        

        $("#magento").click(function(){
            $("#magento-content").css("display", "block");
            $("#shopify-content").css("display", "none");
            $("#woocom-content").css("display", "none");
        });

        $("#woocom").click(function(){
            $("#woocom-content").css("display", "block");
            $("#magento-content").css("display", "none");
            $("#shopify-content").css("display", "none");
        });
    });
</script>
@endsection
