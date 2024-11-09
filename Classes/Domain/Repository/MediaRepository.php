<?php

declare(strict_types=1);

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

use InvalidArgumentException;
use Sto\Html5mediakit\Domain\Model\Media;
use Sto\Html5mediakit\Exception\MediaMissingException;
use TYPO3\CMS\Core\Context\LanguageAspect;
use TYPO3\CMS\Extbase\Persistence\QueryInterface;
use TYPO3\CMS\Extbase\Persistence\Repository;

/**
 * Repository for retrieving media files from the database.
 */
class MediaRepository extends Repository
{
    /**
     * Returns the first media element that was found for the given
     * content element UID (there should only be one).
     */
    public function findOneByContentElementUid(int $contentElementUid): Media
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        // We do not want to do any language overlay in our query because the content element UID
        // is already the UID of the translated content element.
        $languageAspect = $query->getQuerySettings()->getLanguageAspect();
        $languageAspect = new LanguageAspect(
            $languageAspect->getId(),
            $languageAspect->getContentId(),
            LanguageAspect::OVERLAYS_OFF,
            $languageAspect->getFallbackChain(),
        );
        $query->getQuerySettings()->setLanguageAspect($languageAspect);

        $query->matching($query->equals('contentElement', $contentElementUid));

        return $this->fetchMediaOrThrowMissingMediaException($query);
    }

    public function findOneByParentRecord(array $data): Media
    {
        $this->validateParentRecordData($data);

        $parentTable = $data['parent_table'];
        $parentRecord = $data['parent_record'];

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);

        $andCondition = $query->logicalAnd(
            $query->equals('parentTable', $parentTable),
            $query->equals('parentRecord', $parentRecord),
        );

        $query->matching($query->logicalAnd($andCondition));

        return $this->fetchMediaOrThrowMissingMediaException($query);
    }

    private function fetchMediaOrThrowMissingMediaException(QueryInterface $query): Media
    {
        $media = $query->execute()->getFirst();

        if (!$media instanceof Media) {
            throw new MediaMissingException();
        }

        return $media;
    }

    private function validateParentRecordData($data): void
    {
        if (empty($data['parent_table'])) {
            throw new InvalidArgumentException('parent_table field is missing in content data.');
        }
        if (empty($data['parent_record'])) {
            throw new InvalidArgumentException('parent_record field is missing in content data.');
        }
    }
}
