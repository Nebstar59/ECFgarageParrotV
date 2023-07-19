<?php

namespace App\Repository;

use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Car>
 *
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findAll()
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }

    public function getLastCars()
    {
        return $this->findBy([], ['createdAt' => 'DESC'], 3);
    }

    public function getBestCars()
    {
        return $this->findBy([], ['price' => 'ASC'], 3);
    }

    public function getWorstCars()
    {
        return $this->findBy([], ['price' => 'DESC'], 3);
    }

    public function getRandomCars()
    {
        return $this->findBy([], [], 6);
    }

    public function searchCars($data)
    {
        $qb = $this->createQueryBuilder('c');
        if ($data->getBrand()) {
            $qb->andWhere('c.brand = :brand')
                ->setParameter('brand', $data->getBrand());
        }
        if ($data->getModel()) {
            $qb->andWhere('c.model = :model')
                ->setParameter('model', $data->getModel());
        }
        if ($data->getPrice()) {
            $qb->andWhere('c.price = :price')
                ->setParameter('price', $data->getPrice());
        }
        
        return $qb->getQuery()->getResult();
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function search($data) : array
    {
        $qb = $this->createQueryBuilder('c');
        if ($data->getBrand()) {
            $qb->andWhere('c.brand = :brand')
                ->setParameter('brand', $data->getBrand());
        }
        if ($data->getModel()) {
            $qb->andWhere('c.model = :model')
                ->setParameter('model', $data->getModel());
        }
        if ($data->getPrice()) {
            $qb->andWhere('c.price = :price')
                ->setParameter('price', $data->getPrice());
        }
        
        return $qb->getQuery()->getResult();
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrand($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByModel($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.model = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByPrice($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.price = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByKilometers($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.kilometers = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByYear($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.releaseYear = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndModel($value1, $value2): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.model = :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndPrice($value1, $value2): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.price = :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndKilometers($value1, $value2): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.kilometers = :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndModelAndPrice($value1, $value2, $value3): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.model = :val2')
            ->andWhere('c.price = :val3')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->setParameter('val3', $value3)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndModelAndKilometers($value1, $value2, $value3): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.model = :val2')
            ->andWhere('c.kilometers = :val3')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->setParameter('val3', $value3)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndPriceAndKilometers($value1, $value2, $value3): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.price = :val2')
            ->andWhere('c.kilometers = :val3')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->setParameter('val3', $value3)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    /**
     * @return Car[] Returns an array of Car objects
     */
    public function findByBrandAndModelAndPriceAndKilometers($value1, $value2, $value3, $value4): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.model = :val2')
            ->andWhere('c.price = :val3')
            ->andWhere('c.kilometers = :val4')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->setParameter('val3', $value3)
            ->setParameter('val4', $value4)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }


    public function findByExampleField($value): array
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @return Car[] Returns an array of Car objects
     */

    public function findOneByBrand($value): ?Car
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByModel($value): ?Car
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.model = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByPrice($value): ?Car
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.price = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByKilometers($value): ?Car
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.kilometers = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findOneByBrandAndModel($value1, $value2): ?Car
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.brand = :val1')
            ->andWhere('c.model = :val2')
            ->setParameter('val1', $value1)
            ->setParameter('val2', $value2)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

    public function findBySearch($searchCar): array
    {
        $query = $this->createQueryBuilder('c');
        if ($searchCar->getBrand()) {
            $query = $query
                ->andWhere('c.brand = :brand')
                ->setParameter('brand', $searchCar->getBrand());
        }
        if ($searchCar->getModel()) {
            $query = $query
                ->andWhere('c.model = :model')
                ->setParameter('model', $searchCar->getModel());
        }
        if ($searchCar->getPrice()) {
            $query = $query
                ->andWhere('c.price = :price')
                ->setParameter('price', $searchCar->getPrice());
        }
        if ($searchCar->getKilometers()) {
            $query = $query
                ->andWhere('c.kilometers = :kilometers')
                ->setParameter('kilometers', $searchCar->getKilometers());
        }
        return $query->getQuery()->getResult();

    }

}
