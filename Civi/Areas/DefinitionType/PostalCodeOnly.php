<?php
/**
 * @license http://www.gnu.org/licenses/agpl-3.0.html
 */

namespace Civi\Areas\DefinitionType;

use Civi\Areas\DefinitionType\AbstractDefinitionType;

use CRM_Areas_ExtensionUtil as E;

class PostalCodeOnly extends AbstractDefinitionType {

	/**
	 * Returns the where part of the query to fetch definition types from the civicrm_area_definition table.
	 *
	 * For example if you want the fetch all definition for the city London your query will return
	 *   "LOWER(`city`) = 'london'"
	 * The constructed query will then look like:
	 *   SELECT * FROM civicrm_area_definition WHERE ((LOWER(`city`) = 'london') AND `type` = 'city')
	 *
	 * If there is no condition for the address data you should return false.
	 *
	 * @param array $address
	 *    Address data
	 * @return string|false
	 *   The where part of the query or false when you cannot provide a where clause.
	 */
	public function getWhereClause($address) {
		if (isset($address['postal_code']) && !empty($address['postal_code'])) {
			$postal_code = \CRM_Utils_Type::escape(trim($address['postal_code']), 'String');
			return "REPLACE(`postal_code`, ' ', '') = REPLACE('$postal_code', ' ', '')";
		}
		return false;
	}

	/**
	 * Returns whether the address is valid with the given definition data
	 *
	 * @param array $address
	 *   Address data.
	 * @param array $definitionData
	 *   The data from the civicrm_area_definition table.
	 * @return bool
	 */
	public function isTypeValidForAddress($address, $definitionData) {
		if (!isset($definitionData['postal_code']) || empty($definitionData['postal_code'])) {
			return false;
		}
		if (!isset($address['postal_code']) || empty($address['postal_code'])) {
			return false;
		}
		if (trim(mb_strtolower(str_replace(' ','',$address['postal_code']))) == trim(mb_strtolower(str_replace(' ','',$definitionData['postal_code'])))) {
			return true;
		}
		return false;
	}

	/**
	 * Returns the title.
	 *
	 * @return string
	 */
	public function getTitle() {
		return E::ts('Postal code without country');
	}

	/**
	 * Returns a userfriendly representation of the definition settings.
	 *
	 * Example County = Netherlands
	 *
	 * @return string
	 */
	public function getUserfriendlyConfiguration($definitionData) {
		if (!isset($definitionData['postal_code'])) {
			return '';
		}
		$postal_code = $definitionData['postal_code'];
		return E::ts('%1', array(1=>$postal_code));
	}

	/**
	 * Returns the name of the angular template for editing/adding a new definition to an area.
	 *
	 * @return string
	 */
	public function getAngularTemplateUrl() {
		return '~/canadianpostalcodesforareas/PostalCodeOnlyCtl.html';
	}

}
