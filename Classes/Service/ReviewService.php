<?php
declare(strict_types = 1);

namespace GoogleBusiness\GoogleReviews\Service;

use Psr\Log\{LoggerAwareInterface, LoggerAwareTrait};

class ReviewService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param array $settings
     * @return array
     */
    public function getReviewRecords(array $settings): array
    {
        if (empty($settings['apiKey'])) {
            $this->logger->error(
                'Google API key wasn`t set! Please set \'plugin.tx_googlereviews_pi1.apiKey\' TypoScript constant.'
            );
            return [];
        }

        $reviews = $this->getResponseRecords($settings);

        if (count($reviews) < 2) {
            return $reviews;
        }

        $sortedReviews = $this->sortResult($reviews, $settings['sortBy']);

        return array_slice($sortedReviews, 0, (int)$settings['maxRows']);
    }

    /**
     * @param array $items
     * @param string $sortByField
     * @return array
     */
    protected function sortResult(array $items, string $sortByField = '0'): array
    {
        if ($sortByField === '0') {
            return $items;
        }

        $ratingsItems = array_column($items, $sortByField);
        array_multisort($ratingsItems, SORT_DESC, $items);

        return $items;
    }

    /**
     * Returns API response records according to 'minStarts' flexform configs
     *
     * @param $settings
     * @return array
     */
    protected function getResponseRecords($settings): array
    {
        $queryParams = [
            'key'      => trim((string)$settings['apiKey']),
            'place_id' => (string)$settings['placeId'],
        ];

        $url      = $settings['apiEndpoint'] . 'json?' . http_build_query($queryParams);
        $response = $this->getUrlContent($url);

        if (isset($response['error_message']) === true) {
            $this->logger->error('Error while Google place reviews getting: ' . $response['error_message']);
        }

        $reviews = $response['result']['reviews'];
        if (empty($reviews) === true) {
            return [];
        }

        $minStarts = (int)$settings['minStarts'];
        $reviews = array_map(static function($item) use ($minStarts) {
            if ($item['rating'] >= $minStarts) {
                return $item;
            }
        }, $reviews);

        return array_filter($reviews);
    }

    /**
     * @param string $url
     * @return array|mixed
     */
    protected function getUrlContent(string $url): array
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);

        $data     = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return ($httpCode >= 200 && $httpCode < 300) ? json_decode($data, true) : [];
    }

}
