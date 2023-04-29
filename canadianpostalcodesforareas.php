<?php

require_once 'canadianpostalcodesforareas.civix.php';
// phpcs:disable
use CRM_Canadianpostalcodesforareas_ExtensionUtil as E;
// phpcs:enable

use \Symfony\Component\DependencyInjection\ContainerBuilder;
use \Symfony\Component\DependencyInjection\Definition;


/**
 * Implements hook_civicrm_config().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_config/
 */
function canadianpostalcodesforareas_civicrm_config(&$config) {
  _canadianpostalcodesforareas_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_install
 */
function canadianpostalcodesforareas_civicrm_install() {
  CRM_Core_DAO::executeQuery("ALTER TABLE civicrm_area_definition ADD column postal_code_3_chars VARCHAR(3) NULL");
  CRM_Core_DAO::executeQuery("ALTER TABLE civicrm_area_definition ADD column postal_code_5_chars VARCHAR(5) NULL");
  _canadianpostalcodesforareas_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_postInstall
 */
function canadianpostalcodesforareas_civicrm_postInstall() {
  _canadianpostalcodesforareas_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_uninstall
 */
function canadianpostalcodesforareas_civicrm_uninstall() {
  CRM_Core_DAO::executeQuery("ALTER TABLE civicrm_area_definition DROP column postal_code_3_chars");
  CRM_Core_DAO::executeQuery("ALTER TABLE civicrm_area_definition DROP column postal_code_5_chars");
  _canadianpostalcodesforareas_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_enable
 */
function canadianpostalcodesforareas_civicrm_enable() {
  _canadianpostalcodesforareas_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_disable
 */
function canadianpostalcodesforareas_civicrm_disable() {
  _canadianpostalcodesforareas_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_upgrade
 */
function canadianpostalcodesforareas_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _canadianpostalcodesforareas_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_entityTypes
 */
function canadianpostalcodesforareas_civicrm_entityTypes(&$entityTypes) {
  _canadianpostalcodesforareas_civix_civicrm_entityTypes($entityTypes);
}

function canadianpostalcodesforareas_civicrm_area_definition_fields(&$fields) {
		$fields['postal_code_3_chars'] = array(
			'name' => 'postal_code_3_chars',
    	'title' => E::ts('Postal Code (first 3 characters)'),
      'type' => CRM_Utils_Type::T_STRING,
      'maxlength' => 3,
    	'required' => false
		);
		$fields['postal_code_5_chars'] = array(
			'name' => 'postal_code_5_chars',
    	'title' => E::ts('Postal Code (first 5 characters)'),
      'type' => CRM_Utils_Type::T_STRING,
      'maxlength' => 5,
    	'required' => false
		);
	}

function canadianpostalcodesforareas_civicrm_areas_angularModules(&$modules) {
	$modules[] = 'canadianpostalcodesforareas';
}

/**
 * Implements hook_civicrm_container()
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_container/
 */
function canadianpostalcodesforareas_civicrm_container(\Symfony\Component\DependencyInjection\ContainerBuilder $container) {
  $container->getDefinition('areas_definition_factory')
    ->addMethodCall('addDefinitionType', array(new \Symfony\Component\DependencyInjection\Definition('Civi\Areas\DefinitionType\PostalCode3Chars')))
    ->addMethodCall('addDefinitionType', array(new \Symfony\Component\DependencyInjection\Definition('Civi\Areas\DefinitionType\PostalCode5Chars')))
    ->addMethodCall('addDefinitionType', array(new \Symfony\Component\DependencyInjection\Definition('Civi\Areas\DefinitionType\PostalCodeOnly')))
    ->addMethodCall('addDefinitionType', array(new \Symfony\Component\DependencyInjection\Definition('Civi\Areas\DefinitionType\CityOnly')))
    ->addMethodCall('addDefinitionType', array(new \Symfony\Component\DependencyInjection\Definition('Civi\Areas\DefinitionType\CityCountryNotOther')));
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_preProcess
 */
//function canadianpostalcodesforareas_civicrm_preProcess($formName, &$form) {
//
//}

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link https://docs.civicrm.org/dev/en/latest/hooks/hook_civicrm_navigationMenu
 */
//function canadianpostalcodesforareas_civicrm_navigationMenu(&$menu) {
//  _canadianpostalcodesforareas_civix_insert_navigation_menu($menu, 'Mailings', [
//    'label' => E::ts('New subliminal message'),
//    'name' => 'mailing_subliminal_message',
//    'url' => 'civicrm/mailing/subliminal',
//    'permission' => 'access CiviMail',
//    'operator' => 'OR',
//    'separator' => 0,
//  ]);
//  _canadianpostalcodesforareas_civix_navigationMenu($menu);
//}
