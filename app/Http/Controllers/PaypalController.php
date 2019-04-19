<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// Used to process plans
use PayPal\Api\ChargeModel;
use PayPal\Api\Currency;
use PayPal\Api\MerchantPreferences;
use PayPal\Api\PaymentDefinition;
use PayPal\Api\Plan;
use PayPal\Api\Patch;
use PayPal\Api\PatchRequest;
use PayPal\Common\PayPalModel;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;

// use to process billing agreements
use PayPal\Api\Agreement;
use PayPal\Api\Payer;
//use PayPal\Api\Plan;
use PayPal\Api\ShippingAddress;

class PaypalController extends Controller
{
    private $apiContext;
    private $mode;
    private $client_id;
    private $secret;
    private $plan_id;
    
    // Create a new instance with our paypal credentials
    public function __construct()
    {
        // Detect if we are running in live mode or sandbox
        if(config('paypal.settings.mode') == 'live'){
            $this->client_id = config('paypal.live_client_id');
            $this->secret = config('paypal.live_secret');
            $this->plan_id = env('PAYPAL_LIVE_PLAN_ID', '');
        } else {
            $this->client_id = config('paypal.sandbox_client_id');
            $this->secret = config('paypal.sandbox_secret');
            $this->plan_id = env('PAYPAL_SANDBOX_PLAN_ID', '');
        }
        
        // Set the Paypal API Context/Credentials
        $this->apiContext = new ApiContext(new OAuthTokenCredential($this->client_id, $this->secret));
        $this->apiContext->setConfig(config('paypal.settings'));
    }

    public function create_plan(){

        // Create a new billing plan
        $plan = new Plan();
        $plan->setName('Facturation Mensuelle pour l\'association')
          ->setDescription('Facturation Mensuelle pour l\'association Labess')
          ->setType('infinite');

        // Set billing plan definitions
        $paymentDefinition = new PaymentDefinition();
        $paymentDefinition->setName('Regular Payments')
          ->setType('REGULAR')
          ->setFrequency('Month')
          ->setFrequencyInterval('1')
          ->setCycles('0')
          ->setAmount(new Currency(array('value' => 10, 'currency' => 'EUR')));

        // Set merchant preferences
        $merchantPreferences = new MerchantPreferences();
        $merchantPreferences->setReturnUrl('http://localhost/payment/public/') //a retoucher
          ->setCancelUrl('http://localhost/payment/public/') //a retoucher
          ->setAutoBillAmount('yes')
          ->setInitialFailAmountAction('CONTINUE')
          ->setMaxFailAttempts('0');

        $plan->setPaymentDefinitions(array($paymentDefinition));
        $plan->setMerchantPreferences($merchantPreferences);

        //create the plan
        try {
            $createdPlan = $plan->create($this->apiContext);

            try {
                $patch = new Patch();
                $value = new PayPalModel('{"state":"ACTIVE"}');
                $patch->setOp('replace')
                  ->setPath('/')
                  ->setValue($value);
                $patchRequest = new PatchRequest();
                $patchRequest->addPatch($patch);
                $createdPlan->update($patchRequest, $this->apiContext);
                $plan = Plan::get($createdPlan->getId(), $this->apiContext);

                // Output plan id
                //echo 'Plan ID:' . $plan->getId();

                //Modification manuelle: integrer direction plan id dans .env
                        //apache_setenv(PAYPAL_SANDBOX_PLAN_ID, $plan->getId());
                //fin modification manuelle

            } catch (PayPal\Exception\PayPalConnectionException $ex) {
                echo $ex->getCode();
                echo $ex->getData();
                die($ex);
            } catch (Exception $ex) {
                die($ex);
            }
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
            echo $ex->getCode();
            echo $ex->getData();
            die($ex);
        } catch (Exception $ex) {
            die($ex);
        }

    }

    public function paypalRedirect(){
        // Create new agreement
        $agreement = new Agreement();
        $agreement->setName('Facturation Mensuelle pour l\'association Labess')
          ->setDescription('Basic Subscription')
          ->setStartDate(\Carbon\Carbon::now()->addMinutes(5)->toIso8601String());

        // Set plan id
        $plan = new Plan();
        $plan->setId($this->plan_id);
        $agreement->setPlan($plan);


        // Add payer type
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $agreement->setPayer($payer);

        try {
          // Create agreement
          $agreement = $agreement->create($this->apiContext);

          // Extract approval URL to redirect user
          $approvalUrl = $agreement->getApprovalLink();

          return redirect($approvalUrl);
        } catch (PayPal\Exception\PayPalConnectionException $ex) {
		    echo $ex->getCode(); // Prints the Error Code
		    echo $ex->getData(); // Prints the detailed error message 
		    exit(1);
		    die($ex);
		} catch (Exception $ex) {
			echo $ex->getMessage();
		    die($ex);
		}

    }

    public function paypalReturn(Request $request){

        $token = $request->token;
        $agreement = new \PayPal\Api\Agreement();

        try {
            // Execute agreement
            $result = $agreement->execute($token, $this->apiContext);
            $user = Auth::user();
            $user->role = 'subscriber';
            $user->paypal = 1;
            if(isset($result->id)){
                $user->paypal_agreement_id = $result->id;
            }
            $user->save();

            echo 'New Subscriber Created and Billed';

        } catch (\PayPal\Exception\PayPalConnectionException $ex) {
            echo 'You have either cancelled the request or your session has expired';
        }
    }


    /*public function souscriptionMensuelle(float montant){

        //Créer un plan
        

            //Integrer le paramètre dans l'établissement du plan

            //Utiliser le plan ID dans le .env
        create_plan();
        //Créer l'accord en appelant paypalRedirect

        paypalRedirect()

        //Retour de Paypal avc PaypalReturn
    }*/




}
