<?php

namespace BackendApp\Repository;

use Exception;

class AdRepository implements AdRepositoryInterface
{
    /**
     * Grabs all ads [] just example of extended feature
     *
     * @return array
     */
	public function getAll() : array
	{
		//I am pretending to be a database, getting all ads
		$json = file_get_contents(__DIR__ . '/ads/' . 1 . '.json');
		$json = json_decode($json, true);

		// Should check if its Not empty 
		if (!empty($json['ads'])) {
			return $json['ads'];
		}

		throw new Exception('Files not found');
	}

	 /**
     * ""Pretend way of getting data for just finding ID""
     *
     * @return array
     */
	public function findByID(int $id) : array
	{
		//I am pretending to be a database, getting ads by id
		$json = file_get_contents(__DIR__ . '/ads/' . 1 . '.json');

		$json = json_decode($json, true);

		foreach ($json['ads'] as $item) {
			if ($item['id'] === $id) {
				return ['layout' => $item['layout']];
 			}
		}

		throw new Exception('Not Found');
	}

	 /**
     * ""little rand function""
     *
     * @return array
     */
	public function randAd() : array
	{
		$json = file_get_contents(__DIR__ . '/ads/' . 1 . '.json');
		$json = json_decode($json, true);
		
		$max = count($json['ads']);
		$id = rand(1,$max);

		return $this->findByID($id);
	}
}
