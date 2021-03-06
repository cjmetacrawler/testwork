<?php
/**
 * Email Addresses
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>
<table class="addresses" cellpadding="0" cellspacing="0" border="0" width="100%">
	<tr>
		<td width="50%" valign="top" class="addresses-td order_items_table_column_pading_first">
			<p><strong><?php _e( "Billing address", 'email-control' ); ?>:</strong></p>
			<address><?php echo $order->get_formatted_billing_address(); ?></address>
		</td>
		<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() && ( $shipping = $order->get_formatted_shipping_address() ) ) : ?>
			<td width="50%" valign="top" class="addresses-td order_items_table_column_pading_last">
				<p><strong><?php _e( "Shipping address", 'email-control' ); ?>:</strong></p>
				<address><?php echo $shipping; ?></address>
			</td>
		<?php endif; ?>
	</tr>
</table>
