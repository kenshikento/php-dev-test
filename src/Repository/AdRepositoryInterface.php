<?php

namespace BackendApp\Repository;

interface AdRepositoryInterface
{
	// Example
	public function getAll() : array;

	public function findById(int $id) : array;

	public function randAd() : array;
}
