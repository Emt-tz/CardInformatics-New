<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchApplicantTourPicture
 * 
 * @property int $id
 * @property string $merch_id
 * @property string $user_id
 * @property string $applicant_tour_code
 * @property string $picture_name
 * @property int $tour
 * @property string $date_created
 *
 * @package App\Models
 */
class MerchApplicantTourPicture extends Model
{
	protected $table = 'merch_applicant_tour_picture';
	public $timestamps = false;

	protected $casts = [
		'tour' => 'int'
	];

	protected $fillable = [
		'merch_id',
		'user_id',
		'applicant_tour_code',
		'picture_name',
		'tour',
		'date_created'
	];
}
