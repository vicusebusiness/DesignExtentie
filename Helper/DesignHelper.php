<?php
/**
 * Vicus Design
 *
 * @category    Vicus
 * @package     Vicus\Design
 * @author      Vicus eBusiness Solutions <info@vicus.nl>
 * @copyright   see LICENSE.txt
 */

namespace Vicus\Design\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\View\DesignInterface;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\View\Design\Theme\ThemeProviderInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\Config\StoreView;

class DesignHelper extends \Magento\Framework\App\Helper\AbstractHelper
{
    protected $themeProvider;
    protected $storeView;

    /**
     * get values of storeView themeProvider and context
     *
     * @param Context $context First
     * @param ThemeProviderInterface $themeProvider Second
     * @param StoreView $storeView Third
     * @return // storeView themeProvider en een constructor
     */
    public function __construct(Context $context, ThemeProviderInterface $themeProvider, StoreView $storeView)
    {
        $this->storeView = $storeView;
        $this->themeProvider = $themeProvider;
        parent::__construct($context);
    }


    /**
     * Gets value from core config inside module path
     * @param  string $path
     */
    public function getStoreConfig($path, $scopeCode = null)
    {
        if ($scopeCode === null) {
            return $this->scopeConfig->getValue($path);
        }
        return $this->scopeConfig->getValue($path, \Magento\Store\Model\ScopeInterface::SCOPE_STORE, $scopeCode);
    }

    /**
     * gets the theme
     *
     * @return $theme
     */
    public function getTheme()
    {
        $themeId = $this->scopeConfig->getValue(
            \Magento\Framework\View\DesignInterface::XML_PATH_THEME_ID,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
            1
        );

        /** @var $theme \Magento\Framework\View\Design\ThemeInterface */
        $theme = $this->themeProvider->getThemeById($themeId);

        return $theme;
    }

    /**
     * get languages as a object
     * 
     * 
     */
    public function getLocales()
    {
        return $this->storeView->retrieveLocales();
    }
}

?>