<?php declare(strict_types=1);

namespace Ihor\Flow\Core\Content\Subscriber\BusinessEventCollectorSubscriber;

use Ihor\Flow\Core\Framework\Event\TagAware;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\Event\EventData\EntityType;
use Shopware\Core\Framework\Event\EventData\EventDataCollection;
use Shopware\Core\System\Tag\TagDefinition;
use Shopware\Core\System\Tag\TagEntity;
use Symfony\Contracts\EventDispatcher\Event;

class BasicExampleEvent extends Event implements TagAware
{
    public const EVENT_NAME = 'example.event';

    public function __construct(
        private readonly Context $context,
        private readonly TagEntity $tag
    ) {
    }

    public function getName(): string
    {
        return self::EVENT_NAME;
    }

    public static function getAvailableData(): EventDataCollection
    {
        return (new EventDataCollection())
            ->add('tag', new EntityType(TagDefinition::class));
    }

    public function getContext(): Context
    {
        return $this->context;
    }

    public function getTag(): TagEntity
    {
        return $this->tag;
    }
}