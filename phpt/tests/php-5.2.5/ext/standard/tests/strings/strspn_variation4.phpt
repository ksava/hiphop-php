--TEST--
Test strspn() function : usage variations - unexpected values of len argument
--FILE--
<?php
/* Prototype  : proto int strspn(string str, string mask [, int start [, int len]])
 * Description: Finds length of initial segment consisting entirely of characters found in mask.
                If start or/and length is provided works like strspn(substr($s,$start,$len),$good_chars) 
 * Source code: ext/standard/string.c
 * Alias to functions: none
*/

/*
* Testing strspn() : with unexpected values of len argument
*/

echo "*** Testing strspn() : with unexpected values of len argument ***\n";

// initialing required variables
$str = 'string_val';
$mask = 'soibtFTf1234567890';
$start = 0;

//get an unset variable
$unset_var = 10;
unset ($unset_var);

// declaring class
class sample  {
  public function __toString() {
    return "object";
  }
}

// creating a file resource
$file_handle = fopen(__FILE__, 'r');


//array of values to iterate over
$values = array(

      // float data
      10.5,
      -10.5,
      10.5e10,
      10.6E-10,
      .5,

      // array data
      array(),
      array(0),
      array(1),
      array(1, 2),
      array('color' => 'red', 'item' => 'pen'),

      // null data
      NULL,
      null,

      // boolean data
      true,
      false,
      TRUE,
      FALSE,

      // empty data
      "",
      '',

      // string data
      "string",
      'string',

      // object data
      new sample(),

      // undefined data
      $undefined_var,

      // unset data
      $unset_var,

      // resource
      $file_handle
);

// loop through each element of the array for start

foreach($values as $value) {
      echo "\n-- Iteration with len value as \"$value\" --\n";
      var_dump( strspn($str,$mask,$start,$value) );  // with all args
};

// closing the resource
fclose($file_handle);

echo "Done"
?>
--EXPECTF--
*** Testing strspn() : with unexpected values of len argument ***

Notice: Undefined variable: undefined_var in %s on line %d

Notice: Undefined variable: unset_var in %s on line %d

-- Iteration with len value as "10.5" --
int(2)

-- Iteration with len value as "-10.5" --
int(0)

-- Iteration with len value as "105000000000" --
int(2)

-- Iteration with len value as "1.06E-9" --
int(0)

-- Iteration with len value as "0.5" --
int(0)

-- Iteration with len value as "Array" --

Warning: strspn() expects parameter 4 to be long, array given in %s on line %d
NULL

-- Iteration with len value as "Array" --

Warning: strspn() expects parameter 4 to be long, array given in %s on line %d
NULL

-- Iteration with len value as "Array" --

Warning: strspn() expects parameter 4 to be long, array given in %s on line %d
NULL

-- Iteration with len value as "Array" --

Warning: strspn() expects parameter 4 to be long, array given in %s on line %d
NULL

-- Iteration with len value as "Array" --

Warning: strspn() expects parameter 4 to be long, array given in %s on line %d
NULL

-- Iteration with len value as "" --
int(0)

-- Iteration with len value as "" --
int(0)

-- Iteration with len value as "1" --
int(1)

-- Iteration with len value as "" --
int(0)

-- Iteration with len value as "1" --
int(1)

-- Iteration with len value as "" --
int(0)

-- Iteration with len value as "" --

Warning: strspn() expects parameter 4 to be long, string given in %s on line %d
NULL

-- Iteration with len value as "" --

Warning: strspn() expects parameter 4 to be long, string given in %s on line %d
NULL

-- Iteration with len value as "string" --

Warning: strspn() expects parameter 4 to be long, string given in %s on line %d
NULL

-- Iteration with len value as "string" --

Warning: strspn() expects parameter 4 to be long, string given in %s on line %d
NULL

-- Iteration with len value as "object" --

Warning: strspn() expects parameter 4 to be long, object given in %s on line %d
NULL

-- Iteration with len value as "" --
int(0)

-- Iteration with len value as "" --
int(0)

-- Iteration with len value as "Resource id #%d" --

Warning: strspn() expects parameter 4 to be long, resource given in %s on line %d
NULL
Done
