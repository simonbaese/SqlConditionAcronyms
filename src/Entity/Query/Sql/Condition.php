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
    if (is_string($field) && stripos($field, 'f$') !== FALSE) {
      $field = str_ireplace('f$', 'field_', $field);
    }

    // Call parent condition.
    parent::condition($field, $value, $operator, $langcode);

    return $this;
  }

}
