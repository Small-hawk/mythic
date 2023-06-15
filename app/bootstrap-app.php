<?php
/**
 * Theme bootstrap file.
 *
 * This file is used to create a new application instance and bind items to the
 * container. This is the heart of the application.
 *
 * @package   Mythic
 * @author    Justin Tadlock <justintadlock@gmail.com>
 * @copyright 2018 Justin Tadlock
 * @license   https://www.gnu.org/licenses/gpl-2.0.html GPL-2.0-or-later
 * @link      https://themehybrid.com/themes/mythic
 */

# ------------------------------------------------------------------------------
# Create a new application.
# ------------------------------------------------------------------------------
#
# Creates the one true instance of the Hybrid Core application. You may access
# this instance via the `\Hybrid\app()` function or `\Hybrid\App` static class
# after the application has booted.

$mythic = \Hybrid\booted() ? \Hybrid\app() : new \Hybrid\Core\Application();

# ------------------------------------------------------------------------------
# Register service providers with the application.
# ------------------------------------------------------------------------------
#
# Before booting the application, add any service providers that are necessary
# for running the theme. Service providers are essentially the backbone of the
# bootstrapping process.

$providers = [
	\Mythic\Providers\AppServiceProvider::class,
	\Hybrid\Template\Hierarchy\Provider::class,
	\Hybrid\Template\Manager\Provider::class,
	\Hybrid\Theme\Provider::class,
	\Hybrid\View\Provider::class,
];

foreach ($providers as $provider) {
	$mythic->provider($provider);
}

# ------------------------------------------------------------------------------
# Perform bootstrap actions.
# ------------------------------------------------------------------------------
#
# Creates an action hook for child themes (or even plugins) to hook into the
# bootstrapping process and add their own bindings before the app is booted by
# passing the application instance to the action callback.

do_action( 'mythic/bootstrap', $mythic );

# ------------------------------------------------------------------------------
# Bootstrap the application.
# ------------------------------------------------------------------------------
#
# Calls the application `boot()` method, which launches the application. Pat
# yourself on the back for a job well done.

$mythic->boot();
