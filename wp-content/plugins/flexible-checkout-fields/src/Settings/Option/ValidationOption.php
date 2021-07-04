<?php
/**
 * .
 *
 * @package WPDesk\FPF\Free
 */

namespace WPDesk\FCF\Free\Settings\Option;

use WPDesk\FCF\Free\Settings\Option\ValidationPostcodeOption;
use WPDesk\FCF\Free\Settings\Option\OptionInterface;
use WPDesk\FCF\Free\Settings\Tab\AdvancedTab;

/**
 * Supports option settings for field.
 */
class ValidationOption extends ValidationPostcodeOption implements OptionInterface {

	/**
	 * Returns available values of option, if exists.
	 *
	 * @return array List of option values.
	 */
	public function get_values(): array {
		$rules = [
			''         => __( 'Default', 'flexible-checkout-fields' ),
			'none'     => __( 'None', 'flexible-checkout-fields' ),
			'email'    => __( 'E-mail', 'flexible-checkout-fields' ),
			'phone'    => __( 'Phone', 'flexible-checkout-fields' ),
		];

		$custom_rules = apply_filters( 'flexible_checkout_fields_custom_validation', [] );
		foreach ( $custom_rules as $rule_key => $rule_data ) {
			$rules[ $rule_key ] = $rule_data['label'];
		}
		return $rules;
	}
}
