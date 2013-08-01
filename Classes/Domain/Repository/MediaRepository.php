<?php
namespace Sto\Html5mediakit\Domain\Repository;


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
?>