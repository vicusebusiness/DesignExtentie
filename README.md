# DesignExtentie
Design extentie voor magento whitelabel


Step 1. install Vicus_Design module with composer

    composer require vicus/design --no-update
    composer update vicus/design
    php bin/magento module:enable Vicus_Design
    php bin/magento setup:upgrade
    php bin/magento setup:di:compile


Step 2. find these 3 files in the following locations

    app/design/frontend/Vicus/theme-name/web/css/source/_variables_extend.less 
    
    vendor/vicus/theme-frontend-name/web/css/source/_variables_extend.less	

    var/view_preprocessed/pub/static/frontend/Vicus/theme-name/nl_NL/css/source/_variables_extend.less


Step 3. place the following import line at the bottom of each _variables_extend.less file

    @import '_design.less';

Step 4. 
