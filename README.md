# Google Reviews Extension for TYPO3

This extension to display Google business reviews on your website.
The simple TYPO3 extension that displays five (most-relevant) Google reviews according to selected Place ID.

## Minimal requirements
- TYPO3 CMS 9.5 - 13.4.x
- PHP 7.x || 8.x
- [Google API key](https://console.cloud.google.com/google/maps-apis/credentials), **with Maps JavaScript API and Places API both enabled via your Google API console.**

## Compatibility
| EXT version  | TYPO3    | PHP       | Support / Development                |
|--------------|----------|-----------|--------------------------------------|
| master (4.x) | 13       | 8.2 - 8.* | Features, bugfixes, security updates |
| 3.x          | 11 - 12  | 7.4 - 8.* | Deprecated (no support)              |
| 2.x          | 10 - 11  | 7.0 - 8.* | Deprecated (no support)              |
| 1.x          | 9.5 - 10 | 7.0 - 7.4 | Deprecated (no support)              |

## Installation (short Version)
The recommended way to install extension is by using Composer.

1. Install the extension with the following command: `composer require ddoronenko/google-reviews`

2. [Include static TypoScript](https://github.com/ddoronenko/google-reviews/blob/master/Documentation/Installation/Index.rst) from the extension in your site package or in the template record of your site.

3. Set constant `plugin.tx_googlereviews.apiKey` with your Google API key in your site package or in the template record of your site.

4. Create a content element of type "Google Reviews" and select the Place ID of the business you want to display reviews for.

Full installation instructions can be found in the [Documentation](https://github.com/ddoronenko/google-reviews/blob/master/Documentation/Index.rst)

## Usage
Please refer to the [Documentation](https://github.com/ddoronenko/google-reviews/blob/master/Documentation/Index.rst)

## Troubleshooting
1. Check TYPO3 logs (`/var/logs/typo3_*.log`) for any errors related to the extension.
2. Make sure you have a valid [Google API key] with Maps JavaScript API and Places API enabled in the Google Cloud .
3. Make sure that billing is enabled for your Google Cloud project, as the Places API requires billing to be active.
4. Make sure you have included the static TypoScript from the extension in your site package or in the Template record of your TYPO3 site.
5. In you include extension "setup.typoscript" file directly in your site package, make sure you have included the "constants.typoscript" file as well, otherwise the extension will not work properly.
6. Check if selected/used Place ID is correct and corresponds to a valid Google business location. [Find ID](https://developers.google.com/maps/documentation/places/web-service/place-id).
7. Check the "Application restrictions" section for the API key configs in your Google Cloud Console. Application restrictions limit an API key’s usage to specific websites, IP addresses, Android applications, or iOS applications. You can set one application restriction per key.

## ChangeLog
Check [ChangeLog](https://github.com/ddoronenko/google-reviews/blob/master/CHANGELOG.md)

## Report a Problem
[Issues tracker](https://github.com/ddoronenko/google-reviews/issues)

## License
See LICENSE for more information.
