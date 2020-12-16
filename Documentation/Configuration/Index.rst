.. include:: ../Includes.txt

.. _configuration:

=============
Configuration
=============

Required
""""""""""""""""

1. On your root page, in the site template, add "Google reviews" in the "Include static (from extensions)" field.

2. Add your Google API key in the "Constant Editor" -> Category "PLUGIN.TX_TX_GOOGLEREVIEWS_PI1"


Plugin configurations
====================
After adding of "Google Reviews [googlereviews_pi1]" plugin on your target page, next plugin configurations are possible:

.. list-table:: Title
   :header-rows: 1

   * - Property
     - Data type
     - Description
   * - Place ID
     - String
     - Place IDs uniquely identify a place in the `Google Places  <https://https://developers.google.com/places/place-id>`__ database and on Google Maps.
   * - Minimum stars
     - Integer
     - Reviews will be shown only if they have min stars count
   * - Language
     - String
     - Language code (ISO2 code), indicating in which language the results should be returned, if possible.
   * - Sort By
     - String
     - Reviews sorting
   * - Limit
     - Integer
     - Max count of the reviews to display (default: 5)
   * - Show author profile photo
     - Boolean
     - If an user's profile photo should be shown
   * - Label for "All Reviews" link
     - String
     - Label for external link leads to all reviews page
   * - Link to "All Reviews"
     - String
     - An external link leads to all reviews page
   * - Show general place information
     - Boolean
     - Outputs place name, average rating, count of reviews of the selected place above the reviews


TypoScript Reference
====================

plugin.tx\_googlereviews_pi1.view
^^^^^^^^^^^^^^^^^^^^^^^

templateRootPaths
""""""""""""""""

:Property:
    templateRootPaths.0.10

:Data type:
   string

:Description:
   Path to the templates

:Default:
   EXT:google_reviews/Resources/Private/Templates/


partialRootPaths
""""""""""""""""

:Property:
    partialRootPaths.0.10

:Data type:
   string

:Description:
   Path to the partials

:Default:
   EXT:google_reviews/Resources/Private/Partials/


layoutRootPaths
""""""""""""""

:Property:
    layoutRootPaths.0.10

:Data type:
   string

:Description:
   Path to the layouts

:Default:
   EXT:google_reviews/Resources/Private/Layouts/


plugin.tx\_googlereviews_pi1.settings
^^^^^^^^^^^^^^^^^^^^^^^

apiEndpoint
""""""""""""""""

:Property:
    apiEndpoint

:Data type:
   string

:Description:
   Google Place API endpoint

:Default:
   https://maps.googleapis.com/maps/api/place/details/


apiKey
""""""""""""""""

:Property:
    apiKey

:Data type:
   string

:Description:
   Google Maps API key, with Maps JavaScript API and Places API both enabled via your Google API console.

:Default:
   -

authorPhotoWidth
""""""""""""""""

:Property:
    authorPhotoWidth

:Data type:
   string

:Description:
   Width of author's profile photo

:Default:
   50
