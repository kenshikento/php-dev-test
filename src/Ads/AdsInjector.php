<?php

namespace BackendApp\Ads;

use BackendApp\Ads\Widgets\WidgetFactory;

class AdsInjector implements AdsInjectorInterface
{
	const POINTS = 3.5;
	private $factory;

	public function __construct()
	{
		$this->factory = WidgetFactory::getInstance();
	}

    /**
     * Injects Advert into Article Array once it hits 3.5 or over 
     *
     * @return array
     */
	public function inject(array $article) : array
	{
		if (!isset($article['widgets'])) {
			return $article;
		}

		$points = 0;

		foreach ($article['widgets'] as $key => $widget) {

			$class = $this->factory->create($widget['layout']);
			$points += $class->getPointsValue($widget);

			if ($points >= self::POINTS) {				
				$points = 0; 
				array_splice($article['widgets'], $key + 1, 0, [['layout' => 'ad']]);				
			}
		}
		
		return $article;
	}
}
