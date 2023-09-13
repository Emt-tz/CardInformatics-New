<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MerchApplicantTourDoc
 * 
 * @property int $id
 * @property string $merch_id
 * @property string $user_id
 * @property string $applicant_tour_code
 * @property string $doc_name
 * @property int $tour
 * @property int $loan
 * @property int $query
 * @property string $date_created
 *
 * @package App\Models
 */
class MerchApplicantTourDoc extends Model
{
	protected $table = 'merch_applicant_tour_doc';
	public $timestamps = false;

	protected $casts = [
		'tour' => 'int',
		'loan' => 'int',
		'query' => 'int'
	];

	protected $fillable = [
		'merch_id',
		'user_id',
		'applicant_tour_code',
		'doc_name',
		'tour',
		'loan',
		'query',
		'date_created'
	];
}
