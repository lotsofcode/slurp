<?php namespace Lotsofcode\Slurp;

use Illuminate\Support\ServiceProvider;

class SlurpServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('lotsofcode/slurp');

    include __DIR__.'/../../routes.php';


    $this->app['slurp'] = $this->app->share(function($app) {

      $config = $app->config->get('slurp::config');

      $push = ['base_path' => base_path(), 'environment' => $app['env']];

      foreach ($push as $add => $item) {
        $config[$add] = $item;
      }

      return new SlurpParser();
    });
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
