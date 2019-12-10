<?php

namespace App\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

/**
 * Class NewsValidator.
 *
 * @package namespace App\Validators;
 */
class NewsValidator extends LaravelValidator
{
    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
        	'title' => 'required',
        	'body' => 'required'
		],
        ValidatorInterface::RULE_UPDATE => [],
    ];

    protected $messages = [
    	'title.required' => "Tiêu đề là trường bắt buộc",
    	'body.required' => "Nội dung là trường bắt buộc",
	];
}
