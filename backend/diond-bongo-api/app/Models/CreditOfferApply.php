<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CreditOfferApply
 * 
 * @property string $application_date
 * @property int $id
 * @property string $existing_loan
 * @property string $lender
 * @property string $total_existing_loan
 * @property string $c_employer
 * @property string $c_designation
 * @property string $c_employed_from
 * @property string $c_employed_to
 * @property string $business_name
 * @property string $business_location
 * @property string $R_nida_no
 * @property string $R_f_name
 * @property string $R_birth_date
 * @property string $R_martial_status
 * @property string $R_professional
 * @property string $R_email
 * @property string $R_p_number
 * @property string $R_response
 * @property string $R_comment
 * @property string $income_currency
 * @property string $annual_salary
 * @property string $s_employed_income
 * @property string $other_income
 * @property string $supplimentary_income
 * @property string $income_source
 * @property string $total_annual_income
 * @property string $salary_statement
 * @property string $bank_statement
 * @property string $money_statement
 * @property int $credit_offer_id
 * @property int $bank_id
 * @property string $bankAdm_email
 * @property string $bankAdm_no
 * @property string $bankAdm_message
 * @property int $user_id
 * @property string $apply_status
 * @property string $credit_offer_code
 * @property string $approval_date
 * @property int $delete_status
 * @property string $deleted_coz
 * @property string $deleted_date
 * @property int $accepted_status
 * @property string $accepted_by
 * @property string $accepted_date
 * @property int $query
 *
 * @package App\Models
 */
class CreditOfferApply extends Model
{
	protected $table = 'credit_offer_apply';
	public $timestamps = false;

	protected $casts = [
		'credit_offer_id' => 'int',
		'bank_id' => 'int',
		'user_id' => 'int',
		'delete_status' => 'int',
		'accepted_status' => 'int',
		'query' => 'int'
	];

	protected $fillable = [
		'application_date',
		'existing_loan',
		'lender',
		'total_existing_loan',
		'c_employer',
		'c_designation',
		'c_employed_from',
		'c_employed_to',
		'business_name',
		'business_location',
		'R_nida_no',
		'R_f_name',
		'R_birth_date',
		'R_martial_status',
		'R_professional',
		'R_email',
		'R_p_number',
		'R_response',
		'R_comment',
		'income_currency',
		'annual_salary',
		's_employed_income',
		'other_income',
		'supplimentary_income',
		'income_source',
		'total_annual_income',
		'salary_statement',
		'bank_statement',
		'money_statement',
		'credit_offer_id',
		'bank_id',
		'bankAdm_email',
		'bankAdm_no',
		'bankAdm_message',
		'user_id',
		'apply_status',
		'credit_offer_code',
		'approval_date',
		'delete_status',
		'deleted_coz',
		'deleted_date',
		'accepted_status',
		'accepted_by',
		'accepted_date',
		'query'
	];
}
