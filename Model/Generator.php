<?php
/**
 * Vicus Design
 *
 * @category    Vicus
 * @package     Vicus\Design
 * @author      Vicus eBusiness Solutions <info@vicus.nl>
 * @copyright   see LICENSE.txt
 */

namespace Vicus\Design\Model;

use \Vicus\Design\Helper\DesignHelper;
use \Magento\Framework\Filesystem;
use \Magento\Framework\App\Filesystem\DirectoryList;
use Symfony\Component\Console\Input\ArrayInput;

class Generator
{

    protected $helper;
    protected $fileSystem;
    protected $directoryList;

    /**
     * construct function that calls objects.
     * 
     * @param DesignHelper $helper first.
     * @param Filesystem $fileSystem second.
     * @param DirectoryList $directoryList third.
     */
    public function __construct(
        DesignHelper $helper, 
        Filesystem $fileSystem, 
        DirectoryList $directoryList,
    ) {
        $this->helper = $helper;
        $this->fileSystem = $fileSystem;
        $this->directoryList = $directoryList;
    }

    /**
     * This function makes the desision what content needs to go in the style of the site.
     * 
     * @param bool $empty first.
     * deze param krijgt true of false mee.
     * 
     * @return array $contents.
     */
    protected function getContents($empty) {

        if ($empty == true) {
            \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('var empty = true') . PHP_EOL;
            $contents = '';
            return $contents;
        }

        \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('var empty = false') . PHP_EOL;

        $colorEen = $this->helper->getStoreConfig('design/designSetting/color_1');
        $colorTwee = $this->helper->getStoreConfig('design/designSetting/color_2');
        $colorDrie = $this->helper->getStoreConfig('design/designSetting/color_3');
        $colorPagination = $this->helper->getStoreConfig('design/designSetting/color_pagination');
        $paginationColorState = $this->helper->getStoreConfig('design/designSetting/pagination_color_state');
        $heading1Color = $this->helper->getStoreConfig('design/designSetting/heading1_color');
        $heading2Color = $this->helper->getStoreConfig('design/designSetting/heading2_color');
        $heading3Color = $this->helper->getStoreConfig('design/designSetting/heading3_color');
        $heading4Color = $this->helper->getStoreConfig('design/designSetting/heading4_color');
        $heading5Color = $this->helper->getStoreConfig('design/designSetting/heading5_color');
        $heading6Color = $this->helper->getStoreConfig('design/designSetting/heading6_color');
        $linkColor = $this->helper->getStoreConfig('design/designSetting/link_color');
        $callToActionButtonBgColor = $this->helper->getStoreConfig('design/designSetting/call_to_action_button_bg_color');
        $callToActionButtonBgColorState = $this->helper->getStoreConfig('design/designSetting/call_to_action_button_bg_color_state');
        $secondaryBtnBgColor = $this->helper->getStoreConfig('design/designSetting/secondary_btn_bg_color');
        $secondaryBtnBgColorState = $this->helper->getStoreConfig('design/designSetting/secondary_btn_bg_color_state');
        $secondaryBtnTextColor = $this->helper->getStoreConfig('design/designSetting/secondary_btn_text_color');
        $secondaryBtnExtColorState = $this->helper->getStoreConfig('design/designSetting/secondary_btn_text_color_state');
        $listTextColor = $this->helper->getStoreConfig('design/designSetting/list_text_color');
        $navigationBgColor = $this->helper->getStoreConfig('design/designSetting/navigation_bg_color');	
        $headerTopBackgroundColor = $this->helper->getStoreConfig('design/designSetting/header_top_background_color');
        $headerMiddleBackgroundColor = $this->helper->getStoreConfig('design/designSetting/header_mid_background_color');
        $menuTopItemHoverBgColor = $this->helper->getStoreConfig('design/designSetting/menu_top_item_hover_bg_color');	
        $headerTopTextColor = $this->helper->getStoreConfig('design/designSetting/header_top_text_color');	
        $headerMiddleTextColor = $this->helper->getStoreConfig('design/designSetting/header_mid_text_color');
        $menuTopItemColor = $this->helper->getStoreConfig('design/designSetting/menu_top_item_color');
        $menuTopItemHoverTextColor = $this->helper->getStoreConfig('design/designSetting/menu_top_item_hover_text_color');
        $footerTopBackground = $this->helper->getStoreConfig('design/designSetting/footer_top_background');
        $footerMiddleBackground = $this->helper->getStoreConfig('design/designSetting/footer_middle_background');
        $footerBottomBackground = $this->helper->getStoreConfig('design/designSetting/footer_bottom_background');
        $footerTopTextColor = $this->helper->getStoreConfig('design/designSetting/footer_top_text_color');
        $footerMiddleTextColor = $this->helper->getStoreConfig('design/designSetting/footer_middle_text_color');
        $footerBottomTextColor = $this->helper->getStoreConfig('design/designSetting/footer_bottom_text_color');
        $footerOutsideBackground = $this->helper->getStoreConfig('design/designSetting/footer_outside_background');
        $wishlistBtnColor = $this->helper->getStoreConfig('design/designSetting/wishlist_btn_color');

        $titleSizeDropdownEen = $this->helper->getStoreConfig('design/titleSizeSetting/titleSizeDropdownEen');
        $titleSizeDropdownTwee = $this->helper->getStoreConfig('design/titleSizeSetting/titleSizeDropdownTwee');
        $titleSizeDropdownDrie = $this->helper->getStoreConfig('design/titleSizeSetting/titleSizeDropdownDrie');
        $titleSizeDropdownVier = $this->helper->getStoreConfig('design/titleSizeSetting/titleSizeDropdownVier');
        $titleSizeDropdownVijf = $this->helper->getStoreConfig('design/titleSizeSetting/titleSizeDropdownVijf');
        $titleSizeDropdownZes = $this->helper->getStoreConfig('design/titleSizeSetting/titleSizeDropdownZes');

        $linkWeight = $this->helper->getStoreConfig('design/linkWeightSetting/linkWeight');
        $fontNormal = $this->helper->getStoreConfig('design/fontNormalSetting/fontNormal');

        $breadcrumbSize = $this->helper->getStoreConfig('design/breadcrumbSizeSetting/breadcrumbSize');

        $bulletPoints = $this->helper->getStoreConfig('design/bulletPointsSetting/bulletPoints');

        $headerTextSize = $this->helper->getStoreConfig('design/headerTextSizeSetting/headerTextSize'); 

        $menuTopItemSize = $this->helper->getStoreConfig('design/menuTopItemSizeSetting/menuTopItemSize');

        $designData = [
            '@primary-color:' . $colorEen . ';',
            '@secondary-color:' . $colorTwee . ';',
            '@support-color1:' . $colorDrie . ';',
            '@pagination-color:' . $colorPagination . ';',
            '@pagination-color-state:' . $paginationColorState . ';',
            '@heading1-color:' . $heading1Color . ';',
            '@heading2-color:' . $heading2Color . ';',
            '@heading3-color:' . $heading3Color . ';',
            '@heading4-color:' . $heading4Color . ';',
            '@heading5-color:' . $heading5Color . ';',
            '@heading6-color:' . $heading6Color . ';',
            '@link-color:' . $linkColor . ';',
            '@call-to-action-button-bg-color:' . $callToActionButtonBgColor . ';',
            '@call-to-action-button-bg-color-state:' . $callToActionButtonBgColorState . ';',
            '@secondary-btn-bg-color:' . $secondaryBtnBgColor . ';',
            '@secondary-btn-bg-color-state:' . $secondaryBtnBgColorState . ';',
            '@secondary-btn-text-color:' . $secondaryBtnTextColor . ';',
            '@secondary-btn-text-color-state:' . $secondaryBtnExtColorState . ';',
            '@list-text-color:' . $listTextColor . ';',
            '@navigation-bg-color:' . $navigationBgColor . ';',
            '@header-top-background-color:' . $headerTopBackgroundColor . ';',
            '@header-mid-background-color:' . $headerMiddleBackgroundColor . ';',
            '@menu-top-item-hover-bg-color:' . $menuTopItemHoverBgColor . ';',
            '@header-top-text-color:' . $headerTopTextColor . ';',
            '@header-mid-text-color:' . $headerMiddleTextColor . ';',
            '@menu-top-item-color:' . $menuTopItemColor . ';',
            '@menu-top-item-hover-text-color:' . $menuTopItemHoverTextColor . ';',
            '@footer-top-background:' . $footerTopBackground . ';',
            '@footer-middle-background:' . $footerMiddleBackground . ';',
            '@footer-bottom-background:' . $footerBottomBackground . ';',
            '@footer-top-text-color:' . $footerTopTextColor . ';',
            '@footer-middle-text-color:' . $footerMiddleTextColor . ';',
            '@footer-bottom-text-color:' . $footerBottomTextColor . ';',
            '@footer-outside-background:' . $footerOutsideBackground . ';',
            '@wishlist-btn-color:' . $wishlistBtnColor . ';',
            '@heading1-size:' . $titleSizeDropdownEen . ';',
            '@heading2-size:' . $titleSizeDropdownTwee . ';',
            '@heading3-size:' . $titleSizeDropdownDrie . ';',
            '@heading4-size:' . $titleSizeDropdownVier . ';',
            '@heading5-size:' . $titleSizeDropdownVijf . ';',
            '@heading6-size:' . $titleSizeDropdownZes . ';',
            '@link-weight:' . $linkWeight . ';',
            '@font-normal:' . $fontNormal . ';',
            '@breadcrumb-size:' . $breadcrumbSize . ';',
            '@list-style:' . $bulletPoints . ';',
            '@header-top-font-size:' . $headerTextSize . ';',
            '@menu-top-item-size:' . $menuTopItemSize . ';',
        ];

        $contents = implode("\n", $designData);
        return $contents;
    }

    /**
     * this function makes sure all the nessesary functions with params get activated and run.
     * 
     * @param $empty first default is false.
     * 
     */
    public function execute($empty = false) {

        $contents = $this->getContents($empty);

        $pathConfig = DirectoryList::getDefaultConfig();
        $media = $this->fileSystem->getDirectoryWrite(DirectoryList::APP);
      
        $fullPathReal = 'design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source/_design.less';
        $locales = $this->helper->getLocales();

        foreach ($locales as $locale) {

            // This line is the dynamic build up for the directory and file that needs to be deleted.
            $materialPathToDeleteBeforeCompiling = $this->directoryList->getPath(DirectoryList::TMP_MATERIALIZATION_DIR) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css/source/_design.less';
            $materialPathToDeleteBeforeCompiling2 = $this->directoryList->getPath(DirectoryList::TMP_MATERIALIZATION_DIR) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css/source/_variables_extend.less';
            $materialPath = $this->directoryList->getPath(DirectoryList::APP) . '/design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source/_design.less';
            $materialPathForCheckingIfPathExistsFunction = $this->directoryList->getPath(DirectoryList::APP) . '/design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source';
            $materialPathAddImportToDotLessDocument = $this->directoryList->getPath(DirectoryList::APP) . '/design/' . $this->helper->getTheme()->getFullPath() . '/web/css/source/_variables_extend.less';
            $deleteFolderWithThisPath = $this->directoryList->getPath(DirectoryList::STATIC_VIEW) . '/' . $this->helper->getTheme()->getFullPath() . '/' . $locale . '/css';
            $contentForImportDotLessFile = "\n @import '_design.less';";

            // This is a echo to CLI for testing purposes
            // echo 'materialPathToDeleteBeforeCompiling  ===  ' . $materialPathToDeleteBeforeCompiling . PHP_EOL;
            // echo 'materialPathToDeleteBeforeCompiling2  ===  ' . $materialPathToDeleteBeforeCompiling2 . PHP_EOL;
            // echo 'materialPath  ===  ' . $materialPath . PHP_EOL;
            // echo 'deleteFolderWithThisPath  ===  ' . $deleteFolderWithThisPath . PHP_EOL;

            $materialPathArray = [
                $materialPath,
                $materialPathToDeleteBeforeCompiling
            ];

            if ($empty === true) {
                unlink($materialPathToDeleteBeforeCompiling2);
            }

            if (is_dir($deleteFolderWithThisPath)) {
                array_map('unlink', glob("$deleteFolderWithThisPath/*.*"));

                rmdir($deleteFolderWithThisPath);
            }

            $this->addImportToDotLessDocument($contentForImportDotLessFile, $materialPathToDeleteBeforeCompiling2);
            $this->checkIfDesignDotLessFileExists($materialPathForCheckingIfPathExistsFunction);
            $this->saveFile($contents, $materialPathArray);

        }
        return 69;
    }

    /**
     * this function makes sure all the right files get deleted before generated again
     * 
     * @param array $contents first.
     * @param string $paths second.
     * 
     * @return when file is made.
     */
    protected function saveFile($contents, $paths) {
        foreach ($paths as $path) {

            // This is a echo to CLI for testing purposes.
            // echo 'Check wat path is ===  ' . $path . PHP_EOL;
            if (file_exists($path)) {   
                unlink($path);
            }
            $fp = fopen($path, "w");
            fwrite($fp, $contents);
            
            fclose($fp);
        }
    }

    /**
     * This function will add thats given in $content to the file thats given in $path.
     * The goal is to add a @import to a .less file.
     * 
     * @param string $content first.
     * @param string $path second.
     * 
     * @return when content is added to given file.
     * 
     */
    public function addImportToDotLessDocument($content, $path) {

        // This echo is for testing purposes just to see what path is given in param of this function.
        // echo $path;
        if (file_exists($path)) {

            // This echo is for testing purposes if this echo is called it means the function executed with succes.
            // echo 'yes';
            $fp = fopen($path, "ab");
            fwrite($fp, $content);
            fclose($fp);
        }
    }

    /**
     * This function will check if the following path with file exists.
     * "app/design/frontend/Vicus/whitelabel/web/css/source/_design.less"
     * If it does not exist this function wil create a empty file and this path to your code.
     * If it does exists it wil do nothing and continue the code your running.
     * 
     * @param string $path first.
     * 
     * @return when file does not exists create file else nothing.
     * 
     */
    public function checkIfDesignDotLessFileExists($path) {
        if (!file_exists($path)) {

            // This echo is for testing purposes if this echo is called it means the function executed with succes.
            // echo 'file created';
            mkdir($path, 0777, true);
        } else {

            // This echo is for testing purposes if this echo is called it means the function faild to do its designd purpose.
            // echo 'file not created';
        }
    }
}
?>