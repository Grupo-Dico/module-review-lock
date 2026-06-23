<?php

declare(strict_types=1);

namespace GDMexico\ReviewLock\Block\Adminhtml;

class Grid extends \Magento\Review\Block\Adminhtml\Grid
{
    protected function _prepareColumns()
    {
        $result = parent::_prepareColumns();

        $this->addExportType(
            '*/*/exportCsv',
            __('CSV')
        );

        return $result;
    }
}
