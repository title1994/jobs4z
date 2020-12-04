<?php

namespace Vanguard\Http\Controllers\web\Pay;

use Illuminate\Http\Request;
use Vanguard\Http\Controllers\Controller;
use Illuminate\View\View;

use Vanguard\Products;

use Vanguard\Http\Controllers\web\PostfinancePayPal;

class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    public function show(Request $request, $id){
        $product = Products::find($id);
        return view('pay.index', ['product' => $product, 'level' => $request->level]);
    }

    public function validatePaypal(Request $request){
        return;
    }

    public function cancelPaypal(Request $request){
        return;
    }

    public function credit(Request $request){
        $validData = $request->all();
        $orderTotal = $validData['Amount'];    
        $params = array('orderID', 'amount', 'currency', 'PSPID', 'Operation', 'logo', 'language', 'paramplus', 'SHASIGN');
        usort($params, "cmp");
        $hashSeed = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
        // post account informations
        $data['PSPID'] = "xxxxxxxxxxxxxxxxxxxx";
        // payment informations
        $data['orderID'] = htmlentities("VOIP-" . convert_to_0XX_XXX_XXXX($number) );       
        $data['amount'] = (int)($orderTotal*100. ); // Format the number in integer after being mutliplied by 100 to fit to e-pay requirements
        $data['currency'] = "CHF";
        $data['Operation'] = "SAL";          
        // view informations
        $data['language'] = $locales[ $_SESSION['language']['code'] ];
        $data['logo'] = "https://www.intarnetinc.com/images/switzernet.gif";
        $data['paramplus'] = "numeroSIP=".convert_to_0XX_XXX_XXXX($number);
        $data['TP'] = "http://switzernet.com/public/140819-epay/postfinanceTemplate.php";
        $request = "";
        // Create the signature
        foreach ($params as $i => $p){
            if (isset($data[$p]))
            $request .= strtoupper($p)."=".$data[$p] . $hashSeed;
        }
        $data['SHASIGN'] = strtoupper(sha1($request));
    }

    public function paypal(Request $request){
        $PayPalMode = 'live'; // sandbox or live
        $ReturnURL = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/';
        $PayPalReturnURL    = route('pay.validatepaypal'); //Point to process.php page
        $PayPalCancelURL    = route('pay.cancelpaypal');    //Cancel URL if user clicks cancel
        $PayPalApiUsername = "";
        $PayPalApiPassword = "";
        $PayPalApiSignature = "";

        $validData = $request->all();
        //Parameters for SetExpressCheckout, which will be sent to PayPal
        $padata = 	'&METHOD=SetExpressCheckout'.
                    '&RETURNURL='.urlencode(route('pay.validatepaypal')).
                    '&CANCELURL='.urlencode(route('pay.cancelpaypal')).
                    '&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
                    '&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode("CHF").

                    '&L_PAYMENTREQUEST_0_NAME0='.urlencode($validData['name']).
                    '&L_PAYMENTREQUEST_0_NUMBER0='.urlencode(auth()->user()->email).
                    '&L_PAYMENTREQUEST_0_DESC0='.urlencode($validData['level']).
                    '&L_PAYMENTREQUEST_0_AMT0='.urlencode($validData['Amount']);

        $request->session()->put('ItemName', $validData['name']);
        $request->session()->put('ItemPrice', $validData['Amount']);
        $request->session()->put('ItemNumber', auth()->user()->email);
        $request->session()->put('ItemDesc', $validData['level']);

        //We need to execute the "SetExpressCheckOut" method to obtain paypal token
        $paypal= new PostfinancePayPal();
        $httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

        //echo $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode;
        //Respond according to message we receive from Paypal
        if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
        {
            //Redirect user to PayPal store with Token received.
            $paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
            header('Location: '.$paypalurl);
            
        }else{
            echo "error";
        }

    }

}
