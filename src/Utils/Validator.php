<?php

namespace App\Utils;

class Validator
{
  public static function validate(array $fields, array $data)
  {
    $errors = [];

    foreach ($fields as $field => $rules) {
      if (!isset($data[$field])) {
        $errors[$field] = "O campo {$field} é obrigatório.";
        continue;
      }
      $value = $data[$field];

      foreach ($rules as $rule) {

        if ($rule === 'required' && empty($value)) {
          $errors[$field] = 'The ' . $field . ' field is required';
        }

        if ($rule === 'email' && !filter_var($value, FILTER_VALIDATE_EMAIL)) {
          $errors[$field] = 'The ' . $field . ' field must be a valid email address';
        }

        if ($rule === 'min:6' && strlen($value) < 6) {
          $errors[$field] = 'The ' . $field . ' field must be at least 6 characters';
        }
      }
    }

    if (!empty($errors)) {
      // throw new \Exception(json_encode($errors));
      foreach ($errors as $field => $error) {
          throw new \Exception(json_encode("Error in field ($field): -> {$error}."));
      }
    }

    return $errors;
  }
}
