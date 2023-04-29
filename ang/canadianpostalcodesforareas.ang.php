<?php
// This file declares an Angular module which can be autoloaded
// in CiviCRM. See also:
// \https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_angularModules/n
return [
  'js' => [
    'ang/canadianpostalcodesforareas.js',
    'ang/canadianpostalcodesforareas/*.js',
    'ang/canadianpostalcodesforareas/*/*.js',
  ],
  'css' => [
    'ang/canadianpostalcodesforareas.css',
  ],
  'partials' => [
    'ang/canadianpostalcodesforareas',
  ],
  'requires' => [
    'crmUi',
    'crmUtil',
    'ngRoute',
  ],
  'settings' => [],
];
