<?php declare(strict_types=1);

namespace Ihor\Flow\Core\Content\Subscriber;

use Ihor\Flow\Core\Content\Subscriber\BusinessEventCollectorSubscriber\BasicExampleEvent;
use Shopware\Core\Framework\Event\BusinessEventCollector;
use Shopware\Core\Framework\Event\BusinessEventCollectorEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class BusinessEventCollectorSubscriber implements EventSubscriberInterface
{
    public function __construct(
        private readonly BusinessEventCollector $businessEventCollector
    ) {
    }

    public static function getSubscribedEvents(): array
    {
        return [
            BusinessEventCollectorEvent::NAME => 'onAddExampleEvent',
        ];
    }

    public function onAddExampleEvent(BusinessEventCollectorEvent $event): void
    {
        $collection = $event->getCollection();

        $definition = $this->businessEventCollector->define(BasicExampleEvent::class);

        if (!$definition) {
            return;
        }

        $collection->set($definition->getName(), $definition);
    }
}