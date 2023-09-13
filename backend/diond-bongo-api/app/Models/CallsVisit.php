<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CallsVisit
 * 
 * @property int $id
 * @property string $date
 * @property string $stakeholder_name
 * @property string $stakeholder_title
 * @property string $stakeholder_p_number
 * @property string $call_or_visit
 * @property string $call_details
 * @property string $visit_details
 * @property string $details
 * @property string $comment
 * @property string $Adm_email
 *
 * @package App\Models
 */
class CallsVisit extends Model
{
	protected $table = 'calls_visits';
	public $timestamps = false;

	protected $fillable = [
		'date',
		'stakeholder_name',
		'stakeholder_title',
		'stakeholder_p_number',
		'call_or_visit',
		'call_details',
		'visit_details',
		'details',
		'comment',
		'Adm_email'
	];
}
