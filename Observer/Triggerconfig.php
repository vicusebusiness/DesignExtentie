<?php 

namespace Vicus\Design\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Event\Observer as EventObserver;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use \Vicus\Design\Helper\DesignHelper;
use \Vicus\Design\Model\Generator;
use \Vicus\Design\Command\GenerateStyle;

use \Symfony\Component\Console\Input\ArrayInput;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Output\OutputInterface;

/**
 * Vicus Design
 *
 * @category    Vicus
 * @package     Vicus\Design
 * @author      Vicus eBusiness Solutions <info@vicus.nl>
 * @copyright   see LICENSE.txt
 */

class Triggerconfig implements ObserverInterface
{
    protected $helper;
    protected $generator;
    protected $generateStyle;

    /**
     * construct function that cal objects
     * 
     * @param DesignHelper $helper
     * @param Generator $generator
     * @param GenerateStyle $generateStyle
     */
    public function __construct(DesignHelper $helper, Generator $generator, GenerateStyle $generateStyle)
    {
        $this->helper = $helper;
        $this->generator = $generator;
        $this->generateStyle = $generateStyle;
    }

    /**
     * construct function that cal objects
     * 
     * @param EventObserver $observer
     * 
     * @return true or false
     */
    public function execute(EventObserver $observer)
    {
        $paths = $observer->getEvent()->getData('changed_paths');
        foreach ($paths as $path) {
            if ($path === 'design/designSetting/onOffSwitch') {
                $value = $this->helper->getStoreConfig('design/designSetting/onOffSwitch');
                \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('Starting generation') . PHP_EOL;

                if ($value == 1) {
                    $this->generator->execute(true);
                    return $this;
                }

                $this->generator->execute(false);
                return $this;
            }
        }
        return $this;
    }
}

?>