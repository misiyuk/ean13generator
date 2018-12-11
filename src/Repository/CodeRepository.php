<?php

namespace App\Repository;

use App\Entity\Code;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Code|null find($id, $lockMode = null, $lockVersion = null)
 * @method Code|null findOneBy(array $criteria, array $orderBy = null)
 * @method Code[]    findAll()
 * @method Code[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Code::class);
    }

    /**
     * @param Code $code
     * @throws \Exception
     */
    public function save(Code $code): void
    {
        try{
            $this->_em->persist($code);
            $this->_em->flush();
        } catch (\Exception $e) {
            throw new \Exception('Can\'t save code');
        }
    }
}
