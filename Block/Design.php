<?php

namespace Vicus\Design\Block;

use \Magento\Config\Block\System\Config\Form\Field;

class Design extends \Magento\Config\Block\System\Config\Form\Field
{
    /**
    * @var \Magento\Framework\App\Config\ScopeConfigInterface
    */
    protected $scopeConfig;

    /**
    * Recipient email config path
    */
    const XML_PATH_EMAIL_RECIPIENT = 'contact/email/recipient_email';

    public function __construct( \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig ) {
        $this->scopeConfig = $scopeConfig;
    }
    
    


}