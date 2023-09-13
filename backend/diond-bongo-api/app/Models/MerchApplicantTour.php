<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchApplicantTour
 * 
 * @property int $id
 * @property string $date_created
 * @property string $applicant_tour_code
 * @property string $merch_id
 * @property string $merch_Adm_id
 * @property string $merch_Adm_email
 * @property string $merch_Adm_no
 * @property string $tour_location
 * @property string $specific_location
 * @property string $route_name
 * @property string $days
 * @property string $currency
 * @property string $pay_adult
 * @property string $pay_teenager
 * @property string $pay_child
 * @property string $additional_info
 * @property int $status
 * @property string $expiry_date
 * @property string $expiry
 * @property string $cover_image_name
 * @property string $del_Merch_Adm_email
 * @property Carbon $del_date
 *
 * @package App\Models
 */
class MerchApplicantTour extends Model
{
	protected $table = 'merch_applicant_tour';
	public $timestamps = false;

	protected $casts = [
		'status' => 'int',
		'del_date' => 'datetime'
	];

	protected $fillable = [
		'date_created',
		'applicant_tour_code',
		'merch_id',
		'merch_Adm_id',
		'merch_Adm_email',
		'merch_Adm_no',
		'tour_location',
		'specific_location',
		'route_name',
		'days',
		'currency',
		'pay_adult',
		'pay_teenager',
		'pay_child',
		'additional_info',
		'status',
		'expiry_date',
		'expiry',
		'cover_image_name',
		'del_Merch_Adm_email',
		'del_date'
	];
}
