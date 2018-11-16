<?php

namespace Drupal\sql_entity_condition_acronyms\Entity\Query\Sql;

use Drupal\Core\Entity\Query\Sql\Condition as BaseCondition;

/**
 * Modifies $field value for common condition calls.
 */
class Condition extends BaseCondition {

  /**
   * {@inheritdoc}
   */
  public function condition($field, $value = NULL, $operator = NULL, $langcode = NULL) {

    // Replace acronym for fields.
    if (stripos($field, 'f$') !== FALSE) {
      $field = str_ireplace('f$', 'field_', $field);
    }

    parent::condition($field, $value, $operator, $langcode);
  }

}
