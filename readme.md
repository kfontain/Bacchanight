Projet de communication transdisciplinaire : Bacchanight

-----

Groupe :
- Guillaume CHARLET
- Kenji FONTAINE
- Gauthier LAMARQUE

Accès au site:

cd /net/www/gcharlet001/bacchanight



function bartik_preprocess_page(&$variables) {
  if (isset($variables['node']->type)) {
    $variables['theme_hook_suggestions'][] = 'page__' . $variables['node']->type;
  }
}
