<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ApplicantDocument
 * 
 * @property int $id
 * @property string $application_code
 * @property int $application_id
 * @property string $name
 * @property int $loan
 * @property int $query
 * @property string $date_time
 *
 * @package App\Models
 */
class ApplicantDocument extends Model
{
	protected $table = 'applicant_documents';
	public $timestamps = false;

	protected $casts = [
		'application_id' => 'int',
		'loan' => 'int',
		'query' => 'int'
	];

	protected $fillable = [
		'application_code',
		'application_id',
		'name',
		'loan',
		'query',
		'date_time'
	];
}
