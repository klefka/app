<?php

$messages['en'] = [
	'flitetag-desc' => 'Flite Tag Extension is a simple tag which can be put in wikitext and will generate Flite ad unit',

	// validation errors
	'flite-tag-error-no-required-parameters' => 'No required parameters passed. Provide guid, width and height parameters.',
	'flite-tag-error-invalid-guid' => 'Invalid guid parameter was passed. Provide valid guid or remove this tag from article\'s content.',
	'flite-tag-error-invalid-size' => 'Invalid size of the flite unit was passed. Make sure you provide width and height parameters with numeric value.',
	'flite-tag-error-min-size' => 'Invalid size of the flite unit was passed. Make sure width and height are bigger than 1.',
	'flite-tag-error-unknown' => 'Unknown validation error occurred.',
];

$messages['qqq'] = [
	'flitetag-desc' => 'Extension description',
	'flite-tag-error-no-required-parameters' => 'validation error which appears instead of flite ad unit when none of the parameters were passed',
	'flite-tag-error-invalid-guid' => 'validation error which appears instead of flite ad unit when invalid guid parameter was passed',
	'flite-tag-error-invalid-size' => 'validation error which appears instead of flite ad unit when invalid width or height parameters were passed',
	'flite-tag-error-min-size' => 'validation error which appears instead of flite ad unit when invalid width or height parameters were passed',
	'flite-tag-error-unknown' => 'validation error which appears instead of flite ad unit when an unknown error occurred',
];
