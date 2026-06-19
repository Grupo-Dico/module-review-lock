<?php
declare(strict_types=1);

namespace GDMexico\ReviewLock\Plugin\Adminhtml;

use Magento\Review\Controller\Adminhtml\Product\Save;

class ReviewSavePlugin
{
    public function beforeExecute(Save $subject): void
    {
        $request = $subject->getRequest();
        $post = $request->getPostValue();

        if (!is_array($post)) {
            return;
        }

        unset(
            $post['nickname'],
            $post['title'],
            $post['detail'],
            $post['ratings']
        );

        $request->setPostValue($post);
    }
}
