<?php

namespace AppBundle\Repository;

/**
 * NotificationRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class NotificationRepository extends \Doctrine\ORM\EntityRepository
{

	public function remove($id) {
 		$query = "DELETE FROM notification WHERE id = ?";

		$sth = $this->getEntityManager()->getConnection()->prepare($query);
		$sth->execute($data);
	}

	public function add($data) {
 		$query = "INSERT INTO notification (user_id, data, type, created_at, updated_at) VALUES (?, ?, ?, NOW(), NOW())";

		$sth = $this->getEntityManager()->getConnection()->prepare($query);
		$sth->execute($data);
	}

    public function findByConnection($id)
    {
        return $this->getEntityManager()->createQuery("SELECT n FROM AppBundle:Notification n WHERE n.connect = :id")->setParameter('id', $id)->getResult();
    }

    public function findAllUserNotifications($userId)
    {
        $qb = $this->createQueryBuilder('n')
            ->where('n.user = :id')
            ->setParameter('id', $userId)
            //   ->addSelect('u')
            ->orderBy('n.updatedAt')//    ->innerJoin('n.user', 'u')
        ;

        return $qb->getQuery()->getResult();
    }

    public function findNetworkUserNotifications($userId)
    {
        $qb = $this->createQueryBuilder('n')
            ->where('n.user = :user_id')
            ->setParameter('user_id', $userId)
            ->andWhere("n.type IN(:types)")
            ->setParameter('types', array_values(['accepted', 'pending', 'ignored']))
            ->orderBy('n.updatedAt');

        return $qb->getQuery()->getResult();
    }
}
