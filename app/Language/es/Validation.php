<?php

// override core en language system validation or define your own en language validation message
return [
	// Core Messages
   'noRuleSets'            => 'No rulesets specified in Validation configuration.',
   'ruleNotFound'          => '{0} is not a valid rule.',
   'groupNotFound'         => '{0} is not a validation rules group.',
   'groupNotArray'         => '{0} rule group must be an array.',
   'invalidTemplate'       => '{0} is not a valid Validation template.',

	  // Rule Messages
   'alpha'                 => 'The {field} field may only contain alphabetical characters.',
   'alpha_dash'            => 'The {field} field may only contain alphanumeric, underscore, and dash characters.',
   'alpha_numeric'         => 'The {field} field may only contain alphanumeric characters.',
   'alpha_numeric_punct'   => 'The {field} field may contain only alphanumeric characters, spaces, and  ~ ! # $ % & * - _ + = | : . characters.',
   'alpha_numeric_space'   => 'The {field} field may only contain alphanumeric and space characters.',
   'alpha_space'           => 'The {field} field may only contain alphabetical characters and spaces.',
   'decimal'               => 'The {field} field must contain a decimal number.',
   'differs'               => 'The {field} field must differ from the {param} field.',
   'equals'                => 'The {field} field must be exactly: {param}.',
   'exact_length'          => 'The {field} field must be exactly {param} characters in length.',
   'greater_than'          => 'The {field} field must contain a number greater than {param}.',
   'greater_than_equal_to' => 'The {field} field must contain a number greater than or equal to {param}.',
   'hex'                   => 'The {field} field may only contain hexidecimal characters.',
   'in_list'               => 'The {field} field must be one of: {param}.',
   'integer'               => 'The {field} field must contain an integer.',
   'is_natural'            => 'The {field} field must only contain digits.',
   'is_natural_no_zero'    => 'The {field} field must only contain digits and must be greater than zero.',
   'is_not_unique'         => 'The {field} field must contain a previously existing value in the database.',
   'is_unique'             => 'el campo {field} debe ser un valor único',
   'less_than'             => 'The {field} field must contain a number less than {param}.',
   'less_than_equal_to'    => 'The {field} field must contain a number less than or equal to {param}.',
   'matches'               => 'el campo {field} no es igual al campo {param}.',
   'max_length'            => 'el campo {field} no debe de exceder de {param} caracteres.',
   'min_length'            => 'el campo {field} debe de tener al menos {param} caracteres.',
   'not_equals'            => 'The {field} field cannot be: {param}.',
   'numeric'               => 'el campo {field} debe contener solo numeros.',
   'regex_match'           => 'The {field} field is not in the correct format.',
   'required'              => 'el campo {field} es requerido.',
   'required_with'         => 'The {field} field is required when {param} is present.',
   'required_without'      => 'The {field} field is required when {param} is not present.',
   'string'                => 'The {field} field must be a valid string.',
   'timezone'              => 'The {field} field must be a valid timezone.',
   'valid_base64'          => 'The {field} field must be a valid base64 string.',
   'valid_email'           => 'el campo {field} no es un correo valido.',
   'valid_emails'          => 'The {field} field must contain all valid email addresses.',
   'valid_ip'              => 'The {field} field must contain a valid IP.',
   'valid_url'             => 'The {field} field must contain a valid URL.',
   'valid_date'            => 'The {field} field must contain a valid date.',

	// Credit Cards
   'valid_cc_num'          => '{field} does not appear to be a valid credit card number.',

	// Files
   'uploaded'              => '{field} is not a valid uploaded file.',
   'max_size'              => '{field} is too large of a file.',
   'is_image'              => '{field} is not a valid, uploaded image file.',
   'mime_in'               => '{field} does not have a valid mime type.',
   'ext_in'                => '{field} does not have a valid file extension.',
   'max_dims'              => '{field} is either not an image, or it is too wide or tall.',
];
