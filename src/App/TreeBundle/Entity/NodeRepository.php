<?php
namespace App\TreeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * Class NodeRepository
 *
 * @author    Kamil Socha <kamil.socha@gmail.com>
 */
class NodeRepository extends EntityRepository {

    /**
     * @param integer $treeId Tree id
     *
     * @return \Doctrine\ORM\Query
     */
    public function findNodesByTreeId($treeId = null) {
        $query = $this->findAllNodesQb($treeId);

        return $query->getQuery();
    }

    /**
     * Return QueryBuilder for full data
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findAllNodesQb($treeId = null) {
        if ($treeId == null) {
            throw new BadRequestHttpException("No id provided");
        }

        $query = $this->findSimpleNode()
            ->andWhere('node.tree = :treeId')
            ->setParameter(':treeId', $treeId);

        return $query;
    }
    
    /**
     * @param integer $nodeId Node id
     *
     * @return \Doctrine\ORM\Query
     */
    public function findOneNodeQuery($nodeId = null) {
        $query = $this->findOneNodeQb($nodeId);

        return $query->getQuery();
    }

    /**
     * @param integer $nodeId Node id
     *
     * @return \Doctrine\ORM\QueryBuilder
     *
     * @throws \Exception
     */
    private function findOneNodeQb($nodeId = null) {
        if ($nodeId == null) {
            throw new BadRequestHttpException("Node with provided Id not finded");
        }

        $query = $this->findSimpleNode()
            ->andWhere('node.id = :nodeId')
            ->setParameter(':nodeId', $nodeId);

        return $query;
    }

    /**
     * @param integer $nodeId Node id
     *
     * @return \Doctrine\ORM\Query
     */
    public function findAllNodeInRowQuery($nodeId = null, $treeId = null) {
        $query = $this->findAllNodeInRowQb($nodeId, $treeId);

        return $query->getQuery();
    }

    /**
     * @param integer $nodeId Node id
     *
     * @return \Doctrine\ORM\QueryBuilder
     *
     * @throws \Exception
     */
    private function findAllNodeInRowQb($nodeId = null, $treeId = null) {
        if ($nodeId == null) {
            throw new BadRequestHttpException("Node with provided Id not finded");
        } else if ($treeId == null) {
            throw new BadRequestHttpException("Tree with provided Id not finded");
        }

        $query = $this->findSimpleNode()
            ->andWhere('node.tree = :treeId')
            ->andWhere('node.parentId = :nodeId')
            ->setParameter(':nodeId', $nodeId)
            ->setParameter(':treeId', $treeId);

        return $query;
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findSimpleNode() {
        $query = $this->createQueryBuilder('node')
            ->select('node');

        return $query;
    }

}
