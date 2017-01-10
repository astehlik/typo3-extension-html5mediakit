<?php
declare(strict_types = 1);
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

use Sto\Html5mediakit\Domain\Model\Media;
use Sto\Html5mediakit\Exception\MediaMissingException;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for retrieving media files from the database.
 */
class MediaRepository extends Repository
{
    /**
     * Returns the first media element that was found for the given
     * content element UID (there should only be one)
     *
     * @param int $contentElementUid
     * @return \Sto\Html5mediakit\Domain\Model\Media
     */
    public function findOneByContentElementUid($contentElementUid): Media
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        // We do not want to do any language overlay in our query because the content element UID
        // is already the UID of the translated content element.
        $query->getQuerySettings()->setLanguageMode(null);

        $query->matching($query->equals('contentElement', $contentElementUid));
        $media = $query->execute()->getFirst();

        if (!$media instanceof Media) {
            throw new MediaMissingException();
        }

        return $media;
    }
}
