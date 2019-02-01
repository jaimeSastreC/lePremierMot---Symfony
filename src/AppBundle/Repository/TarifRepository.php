<?php

namespace AppBundle\Repository;

/**
 * TarifRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TarifRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return array
     */
    public function findAll(){
        //requête en commençant par plus petit prix
        return $this->findBy(array(), array('prix_place' => 'ASC'));
    }
}
