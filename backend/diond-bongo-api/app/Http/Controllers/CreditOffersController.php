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
}
