<?php

declare(strict_types=1);

namespace GoogleBusiness\GoogleReviews\Updates;

use TYPO3\CMS\Install\Attribute\UpgradeWizard;
use TYPO3\CMS\Install\Updates\AbstractListTypeToCTypeUpdate;

#[UpgradeWizard('reviewsListCTypeMigration')]
final class ReviewsListCTypeMigration extends AbstractListTypeToCTypeUpdate
{
    public function getTitle(): string
    {
        return 'Migrate "Google Reviews" plugins to content elements.';
    }

    public function getDescription(): string
    {
        return 'The "Google Reviews" plugins are now registered as content element. Update migrates existing records.';
    }

    /**
     * This must return an array containing the "list_type" to "CType" mapping
     *
     * @return array<string, string>
     */
    protected function getListTypeToCTypeMapping(): array
    {
        return [
            'googlereviews_pi1' => 'googlereviews_reviewlist',
        ];
    }

}
