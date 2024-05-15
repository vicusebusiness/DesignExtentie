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



class Triggerconfig implements ObserverInterface
{
    // private $request;
    // private $configWriter;
    protected $helper;
    protected $generator;
    protected $generateStyle;

    public function __construct(DesignHelper $helper, Generator $generator, GenerateStyle $generateStyle)
    {
        $this->helper = $helper;
        $this->generator = $generator;
        $this->generateStyle = $generateStyle;
    }

    public function execute(EventObserver $observer)
    {
        $paths = $observer->getEvent()->getData('changed_paths');
        foreach ($paths as $path) {
            // \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info(print_r($paths, true));
            if ($path === 'design/designSetting/onOffSwitch') {
                $value = $this->helper->getStoreConfig('design/designSetting/onOffSwitch');
                \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('Starting generation') . PHP_EOL;

                if ($value == 1) {
                    //change style bestand
                    $this->generator->execute(true);
                    return $this;
                }

                $this->generator->execute(false);
                return $this;
            }
        }

        // $value = $meetParams['designSetting']['fields']['onOffSwitch']['value'];
        //to print thatn value in system.log
        // $onOffValue = \Vicus\Design\Helper\DesignHelper::getStoreConfig('design/designSetting/onOffSwitch');
        // \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info($value);
        return $this;
    }

    // public function toExecute($value) {
    //     if ($value) {
    //         $this->generator->execute(true);
    //         $arguments = new ArrayInput(['command' => 'setup:static-content:deploy -f']);
    //         $this->getApplication()->find('setup:static-content:deploy -f')->run($arguments, $output);
    //         \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('Ending generation') . PHP_EOL;
    //         return $this;
    //     }

    //     $this->generator->execute(false);
    //     $arguments = new ArrayInput(['command' => 'setup:static-content:deploy -f']);
    //     $this->getApplication()->find('setup:static-content:deploy -f')->run($arguments, $output);
    //     \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('Ending generation') . PHP_EOL;
    //     return $this;
    // }
}

?>