<?php
/**
 * Vicus Design
 *
 * @category    Vicus
 * @package     Vicus\Design
 * @author      Vicus eBusiness Solutions <info@vicus.nl>
 * @copyright   see LICENSE.txt
 */

namespace Vicus\Design\Command;

use Vicus\Design\Model\Generator;
use \Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\ArrayInput;
use \Symfony\Component\Console\Input\InputInterface;
use \Symfony\Component\Console\Output\OutputInterface;
use \Vicus\Design\Helper\DesignHelper;

class GenerateStyle extends Command
{
    protected $generator;
    protected $helper;

    /**
     * get value of generator
     *
     * @param string $generator First
     * @return //De file Generator.php heeft een model die hier word opgehaald
     */
    public function __construct(Generator $generator, DesignHelper $helper) {
        $this->generator = $generator;
        $this->helper = $helper;

        parent::__construct();
    }

    protected function configure() {
        $this->setName('generate:style')->setDescription('Generate dynamic style');
        parent::configure();
    }

    /**
     * Adds two integers together
     *
     * @param string $input First
     * @param string $output Second
     * @return // aan maken van style document en het vullen er van
     */
    public function execute(InputInterface $input, OutputInterface $output) {
        \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('Starting generation') . PHP_EOL;

        $value = $this->helper->getStoreConfig('design/designSetting/onOffSwitch');

        if ($value == 1) {
            $this->generator->execute(true);
        } else {
            $this->generator->execute(false);
        }

        \Magento\Framework\App\ObjectManager::getInstance()->get('Psr\Log\LoggerInterface')->info('Ending generation') . PHP_EOL;

        $arguments = new ArrayInput(['command' => 'setup:static-content:deploy', '--force' => true]);

        $this->getApplication()->find('setup:static-content:deploy')->run($arguments, $output);

        return 0;
    }
}