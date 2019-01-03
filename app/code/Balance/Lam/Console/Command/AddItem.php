<?php

namespace Balance\Lam\Console\Command;

use Magento\Framework\Console\Cli;
use Magento\Framework\Event\ManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Balance\Lam\Model\ItemFactory;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class AddItem.
 * @package Balance\Lam\Console\Command
 */
class AddItem extends Command
{
    const XML_NAME = 'name';
    const XML_DESCRIPTION = 'description';

    /**
     * @var \Balance\Lam\Model\ItemFactory
     */
    private $itemFactory;

    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * @var \Magento\Framework\Event\ManagerInterface
     */
    protected $eventManager;

    /**
     * AddItem constructor.
     *
     * @param \Balance\Lam\Model\ItemFactory            $itemFactory
     * @param \Psr\Log\LoggerInterface                  $logger
     * @param \Magento\Framework\Event\ManagerInterface $manager
     */
    public function __construct(
        ItemFactory $itemFactory,
        LoggerInterface $logger,
        ManagerInterface $manager
    ) {
        $this->itemFactory = $itemFactory;
        $this->logger = $logger;
        $this->eventManager = $manager;
        parent::__construct();
    }

    /**
     * add item by command
     */
    protected function configure()
    {
        $this->setName('balance:item:add')
            ->addArgument(
                self::XML_NAME,
                InputArgument::REQUIRED,
                'Item Name'
            )->addArgument(
                self::XML_DESCRIPTION,
                InputArgument::OPTIONAL,
                'Item Description'
            );
        parent::configure();
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface   $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        /** @var \Balance\Lam\Model\Item $item */
        $item = $this->itemFactory->create();
        $item->setName($input->getArgument(self::XML_NAME));
        $item->setDescription($input->getArgument(self::XML_DESCRIPTION));
        $item->setIsObjectNew(true);
        $item->save();
//        dispatch event
//        $this->eventManager->dispatch('balance_command', ['object'=>$item]);
//        logger with di
//        $this->logger->debug('Item was created!');
        return Cli::RETURN_SUCCESS;
    }
}
