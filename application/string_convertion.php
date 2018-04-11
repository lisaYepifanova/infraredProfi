<?php
function stringConvertion($category_name) {
  $category_name = str_replace(" ", "-", $category_name);
  $category_name = str_replace("(", "-", $category_name);
  $category_name = str_replace(")", "-", $category_name);

  $category_name = str_replace('ü', 'u', $category_name);
  $category_name = str_replace('ö', 'o', $category_name);
  $category_name = str_replace('ä', 'a', $category_name);
  $category_name = str_replace('Ä', 'A', $category_name);
  $category_name = str_replace('Ü', 'U', $category_name);
  $category_name = str_replace('Ö', 'O', $category_name);
  $category_name = str_replace('ß', 'ss', $category_name);
  $category_name = str_replace('™', '', $category_name);
  $category_name = strtolower($category_name);

  return $category_name;
}
