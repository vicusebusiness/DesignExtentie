# DesignExtentie
Design extentie voor magento whitelabel


Step 1. install Vicus_whitelabel, Vicus_Design module with composer

    composer require vicus/theme-frontend-whitelabel
    composer require vicus/design --no-update
    composer update vicus/design
    php bin/magento module:enable Vicus_Design
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile

Step 2. Edit the following file

    /home/patricia/mage2/vendor/vicus/theme-frontend-whitelabel/Magento_Search/layout/default.xml

    DELETE
    ======================================================================================================================================
        <container name="search.full.width" htmlTag="div" htmlClass="search-mobile-full-width" after="minicart">
            <block class="Magento\Framework\View\Element\Template" name="top.search" as="topSearch" template="Magento_Search::form.mini.phtml">
                <arguments>
                    <argument name="configProvider" xsi:type="object">Magento\Search\ViewModel\ConfigProvider</argument>
                </arguments>
            </block>
        </container>
    ======================================================================================================================================

Step 3. run the following command in root directory

    php bin/magento setup:static-content:deploy -f
    php bin/magento generate:style