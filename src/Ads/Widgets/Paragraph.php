<?php

namespace BackendApp\Ads\Widgets;

class Paragraph implements WidgetInterface
{
    /**
     *  Strips widget paragraph text and html whilst / 1000 to get the point value
     *
     * @return float
     */	
	public function getPointsValue(array $widget) : float
	{
		if ($widget['text']) {		
	 		return strlen(html_entity_decode(strip_tags($widget['text']))) / 1000;
		}
		
		return 0;
	}
}
