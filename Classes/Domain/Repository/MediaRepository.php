<?php
namespace Sto\Html5mediakit\Domain\Repository;

/*                                                                        *
 * This script belongs to the TYPO3 Extension "html5mediakit".            *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU General Public License, either version 3 of the   *
 * License, or (at your option) any later version.                        *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Repository for retrieving media files from the database.
 */
class MediaRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {

	/**
	 * Returns the first media element that was found for the given
	 * content element UID (there should only be one)
	 *
	 * @param int $contentElementUid
	 * @return \Sto\Html5mediakit\Domain\Model\Media
	 */
	public function findOneByContentElementUid($contentElementUid) {

		$query = $this->createQuery();
		$query->getQuerySettings()->setRespectStoragePage(FALSE);
		$query->matching($query->equals('contentElement', $contentElementUid));
		return $query->execute()->getFirst();
	}
}