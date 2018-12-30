<?php

namespace AppBundle\Repository;

/**
 * ClientRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ClientRepository extends \Doctrine\ORM\EntityRepository
{
    //recherche par mail client !
    /**
     * @param $email
     * @return array
     */
    public function getClientEmail($email){
        //crée objet constructeur de requete sur table c
        $queryBuilder = $this->createQueryBuilder('c');
        // utilisation du LIKE avec controle entrée setParameter;
        $query = $queryBuilder
            ->select('c')
            ->where('c.mailClient LIKE :mailClient')
            ->setParameter('mailClient', '%'.$email.'%') // sécurité injection !!!
            ->getQuery(); /// important ! à ajouter setParameter pour sécuriser requête
        $results = $query->getOneOrNullResult();
        return $results;
    }
}
