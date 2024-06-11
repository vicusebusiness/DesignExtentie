<?php

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
                ['value' => '4', 'label' => __('4')],
                ['value' => '8', 'label' => __('8')],
                ['value' => '12', 'label' => __('12')],
                ['value' => '16', 'label' => __('16')],
                ['value' => '20', 'label' => __('20')],
                ['value' => '24', 'label' => __('24')],
                ['value' => '28', 'label' => __('28')],
                ['value' => '32', 'label' => __('32')],
                ['value' => '36', 'label' => __('36')],
                ['value' => '40', 'label' => __('40')],
                ['value' => '44', 'label' => __('44')],
                ['value' => '48', 'label' => __('48')],
                ['value' => '52', 'label' => __('52')],
                ['value' => '56', 'label' => __('56')],
                ['value' => '60', 'label' => __('60')],
                ['value' => '64', 'label' => __('64')],
            ];
        } 
    } 
  
?>