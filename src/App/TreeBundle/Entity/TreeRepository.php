<?php
namespace App\TreeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityRepository;

/**
 * Class TreeRepository
 *
 * @author    Kamil Socha <kamil.socha@gmail.com>
 */
class TreeRepository extends EntityRepository {

    /**
     * @return \Doctrine\ORM\Query
     */
    public function findAllTreesQuery() {
        $query = $this->findAllTreesQB()
            ->leftJoin('tree.nodes', 'nodes')
            ->addSelect('nodes');

        return $query->getQuery();
    }

    /**
     * Return QueryBuilder for full data
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findAllTreesQB() {
        $query = $this->findSimpleTree();

        return $query;
    }

    /**
     * @param array   $nodes Request data
     */
    public function save($nodes) {
        $tree = new Tree();
        $this->saveNode($nodes, null, $tree);

        $this->_em->persist($tree);
        $this->_em->flush();
    }

    /**
     * @param array   $nodes Request data
     * @param integer  $parentNodeId Node id
     * @param object   $tree  Tree object
     * @param iteger   $lvl Node level
     */
    private function saveNode($nodes, $parentNodeId = null, $tree) {
        foreach ($nodes as $key => $val) {
            $node = new Node();
            $node->setContent($val["content"]);
            $node->setName($val["name"]);
            $node->setParentId($parentNodeId);
            $node->setNodeId($val["id"]);

            $node->setTree($tree);

            $this->_em->persist($node);

            if(!empty($val["nodes"])) {
                $this->saveNode($val["nodes"], $val["id"], $tree);
            }
        }
    }

    /**
     * @param integer $treeId Tree id
     *
     * @return \Doctrine\ORM\Query
     */
    public function findOneTreeQuery($treeId = null) {
        $query = $this->findOneTreeQb($treeId)
            ->leftJoin('tree.nodes', 'nodes')
            ->addSelect('nodes');

        return $query->getQuery();
    }

    /**
     * @param integer $treeId Tree id
     *
     * @return \Doctrine\ORM\QueryBuilder
     *
     * @throws \Exception
     */
    private function findOneTreeQb($treeId = null) {
        if ($treeId == null) {
            throw new BadRequestHttpException("No id provided");
        }

        $query = $this->findSimpleTree()
            ->andWhere('tree.id = :treeId')
            ->setParameter(':treeId', $treeId);

        return $query;
    }

    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    private function findSimpleTree() {
        $query = $this->createQueryBuilder('tree')
            ->select('tree');

        return $query;
    }

}
