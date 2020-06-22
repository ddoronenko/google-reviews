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

.. t3-field-list-table::
 :header-rows: 1

 - :Property:
         Property:

   :Date type:
         Data type:

   :Description:
         Description:

 - :Property:
         Place ID

   :Date type:
         String

   :Description:
         Place IDs uniquely identify a place in the `Google Places  <https://https://developers.google.com/places/place-id>`__ database and on Google Maps.

 - :Property:
         Minimum stars

   :Date type:
         Integer

   :Description:
         Reviews will be shown only if they have min stars count

 - :Property:
         Sort By

   :Date type:
         String

   :Description:
         Reviews sorting

 - :Property:
         Limit

   :Date type:
         Integer

   :Description:
         Default and max count is 5 reviews

 - :Property:
         Show author profile photo

   :Date type:
         Boolean

   :Description:
         If an user's profile photo should be shown


TypoScript Reference
====================

plugin.tx\_googlereviews_pi1.view
^^^^^^^^^^^^^^^^^^^^^^^

templateRootPaths
""""""""""""""""

.. container:: table-row

   Property
         templateRootPaths.0.10

   Data type
         string

   Description
         Path to templates

   Default
         EXT:google_reviews/Resources/Private/Templates/

partialRootPaths
""""""""""""""""

.. container:: table-row

   Property
         partialRootPaths.0.10

   Data type
         string

   Description
         Path to partials

   Default
         EXT:google_reviews/Resources/Private/Partials/

layoutRootPaths
""""""""""""""

.. container:: table-row

   Property
         layoutRootPaths.0.10

   Data type
         string

   Description
         path to layouts

   Default
         EXT:google_reviews/Resources/Private/Layouts/



plugin.tx\_googlereviews_pi1.settings
^^^^^^^^^^^^^^^^^^^^^^^

apiEndpoint
""""""""""""""""

.. container:: table-row

   Property
         apiEndpoint

   Data type
         string

   Description
         Google Place API endpoint

   Default
         https://maps.googleapis.com/maps/api/place/details/


apiKey
""""""""""""""""

.. container:: table-row

   Property
         apiKey

   Data type
         string

   Description
         Your Google API key

   Default
         -

authorPhotoWidth
""""""""""""""""

.. container:: table-row

   Property
         authorPhotoWidth

   Data type
         string

   Description
         Width of author's profile photo

   Default
         50

