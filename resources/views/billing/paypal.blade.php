@extends('frontend.layout')


@section('title','Checkout')

@section('head')
    <style type="text/css">

        .heading{height:15px}
        #application-container{background:#f1f1f1;font-family:Helvetica,Arial,sans-serif}
        #application-container-container{width:411px;margin:130px auto 0;background:#fff;border:1px solid #b5b5b5;-moz-border-radius:0;-webkit-border-radius:0;border-radius:0;text-align:center}
        #application-container-container h1{font-size:22px;color:#5f5f5f;font-weight:normal;margin:22px 0 26px 0;padding:0}#application-container-container p{font-size:13px;color:#454545;margin:0 0 12px 0;padding:0}
        #application-container-container img{margin:0 0 35px 0;padding:0}.ajaxLoader{margin:80px 153px}.stick-footer .system-footer{position:absolute;bottom:0;width:100%}.login-container .error-msg{margin:0 0 15px 0}
    </style >




@endsection



@section('content')

    <form name="gw" action="https://www.paypal.com/cgi-bin/webscr" method="POST">
        <input type="hidden" name="business" value="admin@cloudonex.com">
        <input type="hidden" name="return" value="https://www.cloudonex.com/invoice/f6f3b03e-51d1-4044-8682-943a469f1a47?token=zN5rCN0y8unalab0">
        <input type="hidden" name="cancel_return" value="https://www.cloudonex.com/invoice/f6f3b03e-51d1-4044-8682-943a469f1a47?token=zN5rCN0y8unalab0">
        <input type="hidden" name="notify_url" value="https://app.stackpie.com/webhook/paypal/1767534b-a674-4925-a316-2305050198e7?sp_payment_for=invoice">
        <input type="hidden" name="item_name" value="INV03980"><input type="hidden" name="amount" value="1">
        <input type="hidden" name="cmd" value="_xclick">
        <input type="hidden" name="no_shipping" value="1">
        <input type="hidden" name="rm" value="2">
        <input type="hidden" name="currency_code" value="USD"><input type="hidden" name="custom" value="5038">
    </form>


@endsection

@section('script')

    <script type="e3ec0465b4020ff385af1b8e-text/javascript">timedText()</script>
    <script type="e3ec0465b4020ff385af1b8e-text/javascript">



function timedText()
{
    setTimeout('msg1()', 2000);
    setTimeout('msg2()', 4000);
  //  setTimeout('document.MetaRefreshForm.submit()',4000);
}

function msg1() {
    document.getElementById('msgbox').firstChild.nodeValue = "Submitting...";
}

function msg2() {
    document.getElementById('msgbox').firstChild.nodeValue = "Redirecting...";
}

</script>
@endsection




