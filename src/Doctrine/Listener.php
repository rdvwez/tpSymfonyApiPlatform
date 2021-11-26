<?php

namespace App\Doctrine;

use Doctrine\ORM\Event\PreFlushEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;

class Listener
{

    public function preUpdate(PreUpdateEventArgs $event)
    {

        foreach ($event->getEntityManager()->getUnitOfWork()->getScheduledEntityUpdates() as $object) {
            if (method_exists($object, "getUpdatedAt")) {
                $object->setUpdatedAt(new \DateTimeImmutable());
            }
        }
    }

    public function preFlush(PreFlushEventArgs $event)
    {

        $em = $event->getEntityManager();
        foreach ($em->getUnitOfWork()->getScheduledEntityDeletions() as $object) {
            if (method_exists($object, "getDeletedAt") && !$object->getDeletedAt() instanceof \DateTimeImmutable) {
                $object->setDeletedAt(new \DateTimeImmutable());
                $em->persist($object);
            }
        }
    }
}
