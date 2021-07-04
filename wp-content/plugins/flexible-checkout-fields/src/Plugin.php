<?php
/**
 * .
 *
 * @package WPDesk\FCF\Free
 */

namespace WPDesk\FCF\Free;

use FcfVendor\WPDesk_Plugin_Info;
use FcfVendor\WPDesk\PluginBuilder\Plugin\AbstractPlugin;
use FcfVendor\WPDesk\PluginBuilder\Plugin\HookableCollection;
use FcfVendor\WPDesk\PluginBuilder\Plugin\HookableParent;
use WPDesk\FCF\Free\Admin;
use WPDesk\FCF\Free\Field;
use WPDesk\FCF\Free\Helpers;
use WPDesk\FCF\Free\Integration;
use WPDesk\FCF\Free\Settings;
/**
 * Main plugin class. The most important flow decisions are made here.
 */
class Plugin extends AbstractPlugin implements HookableCollection {

	use HookableParent;

	/**
	 * Scripts version.
	 *
	 * @var string
	 */
	private $script_version = '1';

	/**
	 * Instance of old version main class of plugin.
	 *
	 * @var \Flexible_Checkout_Fields_Plugin
	 */
	private $plugin_old;

	/**
	 * Plugin constructor.
	 *
	 * @param WPDesk_Plugin_Info               $plugin_info Plugin info.
	 * @param \Flexible_Checkout_Fields_Plugin $plugin_old Main plugin.
	 */
	public function __construct( WPDesk_Plugin_Info $plugin_info, \Flexible_Checkout_Fields_Plugin $plugin_old ) {
		parent::__construct( $plugin_info );

		$this->plugin_url       = $this->plugin_info->get_plugin_url();
		$this->plugin_namespace = $this->plugin_info->get_text_domain();
		$this->script_version   = $plugin_info->get_version();
		$this->plugin_old       = $plugin_old;
	}

	/**
	 * Initializes plugin external state.
	 *
	 * The plugin internal state is initialized in the constructor and the plugin should be internally consistent after creation.
	 * The external state includes hooks execution, communication with other plugins, integration with WC etc.
	 *
	 * @return void
	 */
	public function init() {
		$this->add_hookable( new Admin\NoticeReview() );
		( new Field\Types() )->init();
		$this->add_hookable( new Helpers\Shortener() );
		$this->add_hookable( new Integration\IntegratorIntegration( $this->plugin_old ) );
		$this->add_hookable( new Settings\Page() );
		( new Settings\Forms() )->init();
		( new Settings\Routes() )->init();
		( new Settings\Tabs() )->init();
	}

	/**
	 * Integrate with WordPress and with other plugins using action/filter system.
	 *
	 * @return void
	 */
	public function hooks() {
		$this->hooks_on_hookable_objects();
	}

	/**
	 * Get script version.
	 *
	 * @return string;
	 */
	public function get_script_version() {
		return $this->script_version;
	}
}
