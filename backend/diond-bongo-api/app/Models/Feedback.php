<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * 
 * @property int $id
 * @property string $feedback_no
 * @property string $f_name
 * @property string $email
 * @property string $feedback
 * @property string $date_created
 *
 * @package App\Models
 */
class Feedback extends Model
{
	protected $table = 'feedback';
	public $timestamps = false;

	protected $fillable = [
		'feedback_no',
		'f_name',
		'email',
		'feedback',
		'date_created'
	];
}
