<?php

namespace Vicus\Design\Model\Config\Source;

class BulletPointsList implements \Magento\Framework\Option\ArrayInterface
    {
        /**
         * {@inheritdoc}
         *
         * @codeCoverageIgnore
         */
        public function toOptionArray()
        {
            return [
                ['value' => 'disc', 'label' => __('Disc')],
                ['value' => 'circle', 'label' => __('Circle')],
                ['value' => 'square', 'label' => __('Square')],
                ['value' => 'decimal', 'label' => __('Decimal')],
                ['value' => 'lower-roman', 'label' => __('Lower Roman')],
                ['value' => 'upper-roman', 'label' => __('Upper Roman')],
                ['value' => 'lower-alpha', 'label' => __('Lower Alpha')],
                ['value' => 'upper-alpha', 'label' => __('Upper Alpha')],
                ['value' => 'none', 'label' => __('None')],
            ];
        } 
    } 
  
?>