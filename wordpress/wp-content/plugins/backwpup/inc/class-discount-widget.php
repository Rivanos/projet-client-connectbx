<?php

/**
 * Display widget advertising 40% off BackWPup pro.
 */
class BackWPup_Discount_Widget {

	const NOTICE_ID = 'pro_discount';
	const WIDGET_TITLE = 'Celebrate 4 Million Downloads with Us!';

	/**
	 * A flag set once per request that is true when the widget should not be shown on the page
	 *
	 * @var bool
	 */
	private static $should_show;

	private static $pages_to_skip = array(
		'backwpup-pro_page_backwpup-phone-home-consent',
	);

	public function setup_widget() {
		if ( defined( 'INPSYDE_DASHBOARD_WIDGET' ) && ! INPSYDE_DASHBOARD_WIDGET ) {
			return;
		}

		if ( $this->should_display() ) {
			wp_add_dashboard_widget(
				'backwpup_pro_discount',
				esc_html__( self::WIDGET_TITLE, 'backwpup' ),
				array( $this, 'print_widget_markup' )
			);
		}
	}

	public function print_plugin_widget_markup() {
		static $done;
		if ( ! $done && $this->should_display() ) {
			$done = true;
			?>
			<div class="metabox-holder postbox" id="backwpup_pro_discount">
				<h3 class="hndle"><span><?php echo esc_html__( self::WIDGET_TITLE, 'backwpup' ) ?></span></h3>
				<div class="inside">
					<?php echo $this->widget_markup( 'left' ) ?>
				</div>
			</div>
			<?php
		}
	}

	public function print_widget_markup() {
		if ( defined( 'INPSYDE_DASHBOARD_WIDGET' ) && ! INPSYDE_DASHBOARD_WIDGET ) {
			return;
		}

		static $done;
		if ( ! $done && $this->should_display() ) {
			$done = true;
			echo $this->widget_markup();
		}
	}

	/**
	 * We don't display widget if it was dismissed for good, or if it is after May 1, 2017.
	 *
	 * @return bool
	 */
	private function should_display() {
		// If already checked, don't check again
		if ( is_bool( self::$should_show ) ) {
			return self::$should_show;
		}

		$option = new BackWPup_Dismissible_Notice_Option( false );

		// If notice is dismissed for good, don't show it
		self::$should_show = ! $option->is_dismissed( self::NOTICE_ID );

		$screen        = get_current_screen();
		$is_dashboard  = $screen->id === 'dashboard';
		$is_backwpup   = $screen->id === 'toplevel_page_backwpup' || strpos( $screen->id, 'backwpup' ) === 0;
		$pages_to_skip = in_array( $screen->id, self::$pages_to_skip, true );

		// On pages explicitly skipped, don't show anything
		if ( ! $is_dashboard && ( ! $is_backwpup || $pages_to_skip ) ) {
			self::$should_show = false;
			return self::$should_show;
		}

		$expiration_date = new DateTime('2017-05-02 00:00:00');
		$now = new DateTime('now');

		if ( $now >= $expiration_date ) {
			self::$should_show = false;
		}

		return self::$should_show;
	}

	/**
	 * The markup for the admin notice.
	 *
	 * @param string $btn_float
	 *
	 * @return string
	 */
	private function widget_markup( $btn_float = 'right' ) {
		$dismiss_url = BackWPup_Dismissible_Notice_Option::dismiss_action_url(
			self::NOTICE_ID,
			BackWPup_Dismissible_Notice_Option::FOR_USER_FOR_GOOD_ACTION
		);

		$discount_url = __(
			'https://backwpup.com/?utm_source=BackWPup&utm_medium=Link&utm_campaign=4million#buy',
			'backwpup'
		);

		ob_start();
		?>
		<div>
			<p align="justify">
				<?php
				esc_html_e(
					'We want to celebrate our 4 millionth download! And we want to say thank you! With an amazing 40% BackWPup discount on BackWPup PRO from April 25th to May 1st, 2017!',
					'backwpup'
				);
				?>
			</p>
			<p>
			<a
				style="background: #8fba2b; border-color: #7ba617 #719c0d #719c0d; -webkit-box-shadow: 0 1px 0 #719c0d; box-shadow: 0 1px 0 #719c0d; text-shadow: 0 -1px 1px #719c0d, 1px 0 1px #719c0d, 0 1px 1px #719c0d, -1px 0 1px #719c0d;"
				class="button button-large button-primary"
				href="<?php echo esc_url( $discount_url ) ?>"
				target="_blank">
				<?php echo esc_html__( 'Get an amazing discount with coupon code "4million"', 'backwpup' ) ?>
			</a>

				<a class="button button-small" id="backwpup_dismiss_pro_discount" href="<?php echo esc_url( $dismiss_url ) ?>">
					<?php echo esc_html__( 'Don\'t show again', 'backwpup' ) ?>
				</a>
			</p>
		</div>
		<script>
			(
				function( $ ) {
					$( '#backwpup_dismiss_pro_discount' ).on( 'click', function( e ) {
						e.preventDefault();
						$.post( $( this ).attr( 'href' ), { isAjax: 1 } );
						$( '#backwpup_pro_discount' ).hide();
						$( '#backwpup_pro_discount-hide' ).click();
					} );
				}
			)( jQuery );
		</script>
		<?php

		return ob_get_clean();
	}
}
