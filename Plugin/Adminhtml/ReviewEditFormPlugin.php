<?php
declare(strict_types=1);

namespace GDMexico\ReviewLock\Plugin\Adminhtml;

use Magento\Framework\Data\Form;
use Magento\Review\Block\Adminhtml\Edit\Form as ReviewForm;

class ReviewEditFormPlugin
{
    public function afterGetForm(ReviewForm $subject, ?Form $form): ?Form
    {
        if (!$form) {
            return $form;
        }

        foreach (['nickname', 'title', 'detail'] as $fieldName) {
            $field = $form->getElement($fieldName);

            if ($field) {
                $field->setReadonly(true);
                $field->setDisabled(true);
            }
        }

        return $form;
    }
}
