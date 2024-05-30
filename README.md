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

Step 3. Make sure you are on the right theme. (White label) in back end and make following path

    In the "app/design/frontend" folder make the following path
    "/Vicus/whitelabel/web/css/source/_design.less"
    you dont have to fill the _design.less file

Step 4. run the following command in root directory

    php bin/magento setup:static-content:deploy -f
    php bin/magento generate:style

Step 5. find this file in the following location

    mage2/var/view_preprocessed/pub/static/frontend/Vicus/whitelabel/en_US/css/source/_variables_extend.less

    place the following import line at the bottom of the _variables_extend.less file

    @import '_design.less';

Step 6. Run the following commands

    php bin/magento setup:di:compile
    php bin/magento generate:style
