<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>


	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h5><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h5>
	<ul class="summary-table">
	

		
			<li><span><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?>:</span>
			<span><?php wc_cart_totals_subtotal_html(); ?></span>
		</li>
		

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<li>
				<span><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
				<span><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
			</li>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

			<li>
				<span><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></span>
				<span><?php woocommerce_shipping_calculator(); ?></span>
			</li>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<li>
				<span><?php echo esc_html( $fee->name ); ?></span>
				<span><?php wc_cart_totals_fee_html( $fee ); ?></span></li>
			</tr>
		<?php endforeach; ?>

		<?php
		if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
			$taxable_address = WC()->customer->get_taxable_address();
			$estimated_text  = '';

			if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
				/* translators: %s location. */
				$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
			}

			if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
				foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
					?>
					
						<li><span><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
						<span><?php echo wp_kses_post( $tax->formatted_amount ); ?></span></li>
					
					<?php
				}
			} else {
				?>
				<li><span>
					<?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
					<span><?php wc_cart_totals_taxes_total_html(); ?></span>
				</li>
				<?php
			}
		}
		?>

		<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

		<li><span><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
			<span><?php wc_cart_totals_order_total_html(); ?></span>
		</li>

		<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	
   </ul>
	<div class="cart-btn mt-100">
		<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>


