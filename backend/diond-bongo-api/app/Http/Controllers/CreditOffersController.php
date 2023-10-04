<?php

namespace App\Http\Controllers;

use App\Helpers\ApiResponse;
use App\Helpers\UtilsHelper;
use App\Http\Controllers\Controller;
use App\Models\CreditOffer;
use Illuminate\Http\Request;

class CreditOffersController extends Controller
{
    public $response;
    public $utilsHelper;

    public function __construct()
    {
        $this->response = new ApiResponse();
        $this->utilsHelper = new UtilsHelper();
    }

    public function handleLoadCreditOffers(Request $request)
    {
        $user_id = $request->input('user_id');

        $user = \DB::table('registration')->where('id', $user_id)->first();

        if ($user) {
            $creditOffers = CreditOffer::where('expiry', 0)->orderByDesc('id')->get();

            $response = [];
            foreach ($creditOffers as $offer) {
                $creditOffer = [
                    'id'              => (string) $offer->id,
                    'promotion code'  => $offer->promotion_code,
                    'promotion date'  => $offer->date,
                    'institution type' => $offer->institution_type,
                    'credit type'     => $offer->credit_type,
                    'credit product'  => $offer->credit_product,
                    'credit limit'    => $offer->currency . $offer->credit_limit,
                    'interest charge' => $offer->interest_charge,
                    'app deadline'    => $offer->app_deadline,
                ];
                $response[] = $creditOffer;
            }
            return $this->response->sendSuccessResponse($response);
        } else {
            return $this->response->sendFailureResponse('Failed, Invalid user ID');
        }
    }

    public function handleGetCreditOffersDetails($offer_id){
        if($offer_id){
            $creditOffers = CreditOffer::where('id', $offer_id)->get();
            $response = [];
            foreach ($creditOffers as $offer) {
                $creditOffer = [
                    'Type of Financial Institution' => $offer->institution_type,
                    'Number of Employees / Idadi ya Wafanyakazi' => $offer->number_of_employees,
                    'Loans Disbursed in 3 yrs' => $offer->loan_history,
                    'Credit Type / Aina ya Mkopo' => $offer->credit_type,
                    'Credit Product / Bidhaa ya Mkopo' => $offer->credit_product,
                    'Credit Limit / Ukomo wa Mkopo' => $offer->credit_limit,
                    'Interest Charge / Malipo ya Riba' => $offer->interest_charge,
                    'Annual Fee / Ada ya Mwaka' => $offer->annual_fee,
                    'Late Payment Fee / Ada ya Malipo ya Kuchelewa' => $offer->late_payment_fee,
                    'Other Fee / Ada Nyingine' => $offer->other_fee,
                    'Payback Period / Kipindi cha Malipo' => $offer->payback_periods,
                    'Application Deadline / Mwisho wa kutuma maombi' => $offer->app_deadline,
                    'Product Promotional Content / Maudhui ya Utangazaji wa Mkopo' => $offer->additional_info,
                    'id'              => (string) $offer->id,
                ];
                $response[] = $creditOffer;
            }
            return $this->response->sendSuccessResponse($response);
        } else {
            return $this->response->sendFailureResponse('Failed, No offer id provided');
        }
    }
}
