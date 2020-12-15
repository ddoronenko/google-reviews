<?php
declare(strict_types = 1);

namespace GoogleBusiness\GoogleReviews\Service;

use Psr\Log\{LoggerAwareInterface, LoggerAwareTrait};

class PlaceService implements LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @param array $settings
     * @return array
     */
    public function getPlaceRecord(array $settings): array
    {
        if (empty($settings['apiKey'])) {
            $this->logger->error(
                'Google API key wasn`t set! Please set \'plugin.tx_googlereviews_pi1.apiKey\' TypoScript constant.'
            );
            return [];
        }

        $response = $this->getGoogleResponse($settings);

        if (empty($response['result']) === true) {
            return [];
        }

        return [
            'name' => $response['result']['name'],
            'averageRating' => $response['result']['rating'],
            'roundedAverageRating' => round($response['result']['rating']),
            'reviewCount'  => (int)$response['result']['user_ratings_total'],
            'reviews' => $this->getFilteredReviews($response['result']['reviews'] ?? [], $settings)
        ];
    }

    /**
     *
     * @param array $reviews
     * @param array $settings
     * @return array
     */
    protected function getFilteredReviews(array $reviews, array $settings): array
    {
        if (empty($reviews) === true) {
            return [];
        }

        $minStarts = (int)$settings['minStarts'];
        $reviews = array_map(static function($item) use ($minStarts) {
            if ($item['rating'] >= $minStarts) {
                return $item;
            }
        }, $reviews);

        $reviews = array_filter($reviews);

        if (count($reviews) < 2) {
            return $reviews;
        }

        $sortedReviews = $this->sortReviews($reviews, $settings['sortBy']);

        return array_slice($sortedReviews, 0, (int)$settings['maxRows']);
    }

    /**
     * @param array $items
     * @param string $sortByField
     * @return array
     */
    protected function sortReviews(array $items, string $sortByField = '0'): array
    {
        if ($sortByField === '0') {
            return $items;
        }

        $ratingsItems = array_column($items, $sortByField);
        array_multisort($ratingsItems, SORT_DESC, $items);

        return $items;
    }

    /**
     * returns PlaceID API response
     *
     * @param $settings
     * @return array
     */
    protected function getGoogleResponse($settings): array
    {
        $queryParams = [
            'key'      => trim((string)$settings['apiKey']),
            'place_id' => (string)$settings['placeId'],
            'language' => mb_strtolower((string)$settings['language'])
        ];

        $url      = $settings['apiEndpoint'] . 'json?' . http_build_query($queryParams);
        $response = $this->getUrlContent($url);

        if (isset($response['error_message']) === true) {
            $this->logger->error('Error while Google place reviews getting: ' . $response['error_message']);
        }

        return $response;
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
