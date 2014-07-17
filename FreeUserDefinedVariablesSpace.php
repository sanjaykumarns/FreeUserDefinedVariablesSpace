<?php
/*
 * Deallocate the space consumed by the user defined variables
 * Making the variables value to NULL instead of using unset,
 * since Making the value to NULL will free the memory that time itself
 * Require this file at the end of your php file so that space consumed by-
 * all defined variables will be freed
 * @author	Sanjay Kumar N S <sanjaykumarns@gmail.com>
 * @date	17-JULY-2014
 */
$ignore 	= array('GLOBALS',
	        '_FILES',
	        '_COOKIE',
	        '_POST',
	        '_GET', 
	        '_SERVER',
	        '_ENV', 
	        'argv',
	        'argc',
	        'ignore');

//$userDefVar 	= 'test value'; //test variable

// diff the ignore list as keys after merging any missing ones with the defined list
$definedVariablesArr = array_diff_key(get_defined_vars() + array_flip($ignore), array_flip($ignore)); //user defined var(s)
// should be left with the user defined var(s)

//In order to test which all user defined variables exists, uncomment the below line
//print_r(array_diff_key(get_defined_vars(), array_flip($ignore)));

$definedVariablesArr = array_keys($definedVariablesArr); // take keys of the array ie the variable names

//loop through the variables and set the value to NULL
foreach($definedVariablesArr AS $var) {
    ${$var} = NULL;
}

// manually unsetting the localscope variables used in theis file
$definedVariablesArr = NULL; 
$var                 = NULL;

//In order to test any user defined vars exists after space removal, uncomment the below line
//print_r(array_diff_key(get_defined_vars() + array_flip($ignore), array_flip($ignore)));

?>