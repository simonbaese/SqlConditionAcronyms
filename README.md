# Introduction
This is a tiny proof-of-concept Drupal module to allow the definition of acronyms in entity query conditions. This can be useful when field machine names are really long.

The module should only be used by experienced Drupal developers who understand the implications that this modification has. 

# Example
Consider the following entity query:

```
$nids = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('status', 1)
      ->condition('type', 'article')   
      ->condition('field_article_title', 'Test')       
      ->execute();     
```

Here `field_article_title` could be replaced by `fa$title` and we would obtain:

```
$nids = $this->entityTypeManager->getStorage('node')->getQuery()
      ->condition('status', 1)
      ->condition('type', 'article')   
      ->condition('fa$title', 'Test')       
      ->execute();     
```

# Setup
The module can simply be installed through the Drupal interface. Then you should define the replacements in `src/Entity/Query/Sql/Condition.php`. For the prior example as follows:

```
if (stripos($field, 'fa$') !== FALSE) {
  $field = str_ireplace('fa$', 'field_article_', $field);
}
```

# Further Ideas
One could look into if the used fields could be detected automatically. Then it would be possible to implement a general pattern for the abbreviations.
