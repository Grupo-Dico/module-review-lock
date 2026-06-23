<?php

declare(strict_types=1);

namespace GDMexico\ReviewLock\Controller\Adminhtml\Product;

use Magento\Backend\App\Action;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\Response\Http\FileFactory;
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Review\Block\Adminhtml\Grid;

class ExportCsv extends Action implements HttpGetActionInterface
{
    const ADMIN_RESOURCE = 'Magento_Review::reviews_all';

    protected $fileFactory;

    public function __construct(
        Action\Context $context,
        FileFactory $fileFactory
    ) {
        $this->fileFactory = $fileFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $fileName = 'reviews.csv';

        $content = $this->_view->getLayout()
            ->createBlock(Grid::class)
            ->getCsvFile();

        return $this->fileFactory->create(
            $fileName,
            $content,
            DirectoryList::VAR_DIR
        );
    }
}
