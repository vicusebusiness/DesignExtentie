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
class ListMode implements \Magento\Framework\Option\ArrayInterface
    {
        /**
         * {@inheritdoc}
         *
         * @codeCoverageIgnore
         */
        public function toOptionArray()
        {
            return [
                ['value' => '4px', 'label' => __('4')],
                ['value' => '8px', 'label' => __('8')],
                ['value' => '12px', 'label' => __('12')],
                ['value' => '16px', 'label' => __('16')],
                ['value' => '20px', 'label' => __('20')],
                ['value' => '24px', 'label' => __('24')],
                ['value' => '28px', 'label' => __('28')],
                ['value' => '32px', 'label' => __('32')],
                ['value' => '36px', 'label' => __('36')],
                ['value' => '40px', 'label' => __('40')],
                ['value' => '44px', 'label' => __('44')],
                ['value' => '48px', 'label' => __('48')],
                ['value' => '52px', 'label' => __('52')],
                ['value' => '56px', 'label' => __('56')],
                ['value' => '60px', 'label' => __('60')],
                ['value' => '64px', 'label' => __('64')],
            ];
        } 
    } 
  
?>