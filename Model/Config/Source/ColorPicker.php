<?php
/**
 * Vicus Design
 *
 * @category    Vicus
 * @package     Vicus\Design
 * @author      Vicus eBusiness Solutions <info@vicus.nl>
 * @copyright   see LICENSE.txt
 */

namespace Vicus\Design\Model\Config\Source;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

class ColorPicker extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */

    protected function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();

        $html .= '<script type="text/x-magento-init">
                {
                    "#'. $element->getHtmlId() . '": {
                        "Vicus_Design/js/color-picker": {
                            "color":"' . $element->getData("value") . '"
                        }
                    }
                }
                </script>';

        return $html;
    }
}