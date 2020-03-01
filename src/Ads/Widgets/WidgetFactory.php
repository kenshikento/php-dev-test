<?php

use BackendApp\Ads\Widgets\WidgetInterface;

namespace BackendApp\Ads\Widgets;

class WidgetFactory
{
	/** Commenting this out as it doesn't follow oop prinicples when its using static function **/

	//private static $instance;

	/*public static function getInstance() : self
	{
		if (empty(self::$instance)) {
			self::$instance = new self();
		}

		return self::$instance;
	}*/

	public function create(string $className) : WidgetInterface
	{
		$class = '';
		$widgetName = str_replace( '_', '-', $className );
		foreach ( explode( '-', $widgetName ) as $fragment ) {
			$class .= ucfirst( $fragment );
		}

		$class = 'BackendApp\\Ads\\Widgets\\' . $class;

		return new $class();
	}
}
