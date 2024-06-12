<?php

namespace Vicus\Design\Model\Config\Source;

class ListLinkWeight implements \Magento\Framework\Option\ArrayInterface
    {
        /**
         * {@inheritdoc}
         *
         * @codeCoverageIgnore
         */
        public function toOptionArray()
        {
            return [
                ['value' => '100', 'label' => __('100')],
                ['value' => '200', 'label' => __('200')],
                ['value' => '300', 'label' => __('300')],
                ['value' => '400', 'label' => __('400')],
                ['value' => '500', 'label' => __('500')],
                ['value' => '600', 'label' => __('600')],
                ['value' => '700', 'label' => __('700')],
                ['value' => '800', 'label' => __('800')],
                ['value' => '900', 'label' => __('900')],
            ];
        } 
    } 
  
?>