.. include:: ../Includes.txt

============
Installation
============

The extension needs to be installed as any other extension of TYPO3 CMS:

#. Switch to the module “Extension Manager”.

#. Get the extension
   #. **Use composer**: Use `composer require ddoronenko/google-reviews`.

   #. **Get it from the Extension Manager:** Press the “Retrieve/Update”
      button and search for the extension key *google_reviews* and import the
      extension from the repository.

   #. **Get it from extensions.typo3.org:** You can always get current version from
      `https://extensions.typo3.org/extension/google_reviews/
      <https://extensions.typo3.org/extension/google_reviews/>`_ by
      downloading either the T3X or ZIP version. Upload the file afterwards in the Extension Manager.

The recommended way to install extension is by using Composer.
If you are not familiar using composer together with TYPO3 yet, you can find a `how to on the TYPO3 website <https://composer.typo3.org/>`__.

Install the extension with the following command:

.. code:: bash

    composer require ddoronenko/google-reviews


Preparation: Include static TypoScript
--------------------------------------

The extension ships some TypoScript code which needs to be included.

#. Switch to the root page of your site.

#. Switch to the **Template module** and select *Info/Modify*.

#. Press the link **Edit the whole template record** and switch to the tab *Includes*.

#. Select **Google reviews (google_reviews)** at the field *Include static (from extensions) -> Available Items:*


`Configuration <https://github.com/ddoronenko/google-reviews/blob/master/Documentation/Configuration/Index.rst>`__