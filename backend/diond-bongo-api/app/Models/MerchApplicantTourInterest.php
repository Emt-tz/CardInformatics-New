<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchApplicantTourInterest
 * 
 * @property int $id
 * @property string $date_created
 * @property string $applicant_tour_code
 * @property string $tour_id
 * @property string $user_id
 * @property string $merch_id
 * @property string $bank_id
 * @property string $bankAdm_email
 * @property string $currency
 * @property string $interest_charge
 * @property string $annual_fee
 * @property string $late_payment_fee
 * @property string $other_fee
 * @property string $payback_periods
 * @property string $authorization
 * @property string $indemnity
 * @property int $accepted
 * @property string $approved_status
 *
 * @package App\Models
 */
class MerchApplicantTourInterest extends Model
{
	protected $table = 'merch_applicant_tour_interest';
	public $timestamps = false;

	protected $casts = [
		'accepted' => 'int'
	];

	protected $fillable = [
		'date_created',
		'applicant_tour_code',
		'tour_id',
		'user_id',
		'merch_id',
		'bank_id',
		'bankAdm_email',
		'currency',
		'interest_charge',
		'annual_fee',
		'late_payment_fee',
		'other_fee',
		'payback_periods',
		'authorization',
		'indemnity',
		'accepted',
		'approved_status'
	];
}
