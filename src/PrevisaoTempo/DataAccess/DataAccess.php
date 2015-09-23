<?php

namespace PrevisaoTempo\DataAccess;

use PrevisaoTempo\DataAccess\Entity\SiglaTempo;

interface DataAccess {
	/**
	 * @param PrevisaoTempo\DataAccess\Entity\SiglaTempo $sigla        	
	 * @return integer
	 */
	public function insert(SiglaTempo $sigla);
}