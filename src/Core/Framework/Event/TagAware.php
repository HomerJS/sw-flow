<?php declare(strict_types=1);

namespace Ihor\Flow\Core\Framework\Event;

use Shopware\Core\Framework\Event\FlowEventAware;

interface TagAware extends FlowEventAware
{
    public const TAG = 'tag';

    public const TAG_ID = 'tagId';

    public function getTag();
}