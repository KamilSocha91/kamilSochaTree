<?php
namespace App\TreeBundle\Services;

use App\TreeBundle\Entity\NodeRepository;
use App\TreeBundle\Entity\Node;

/**
 * Class NodeService
 *
 * @author    Kamil Socha <kamil.socha@gmail.com>
 */
class NodeService  {

    /**
     * @var NodeRepository
     */
    private $nodeRepository;

    /**
     * NodeService constructor.
     *
     * @param NodeRepository $nodeRepository Node repository instance
     *
     */
    public function __construct (nodeRepository $nodeRepository) {
        $this->nodeRepository = $nodeRepository;
    }

    /**
     * Return nodes
     *
     * @param integer $treeId Tree id
     *
     * @throws \Exception
     */
    public function getNodes($treeId = null) {
        $query = $this->nodeRepository->findNodesByTreeId($treeId);

        return $query->getResult();
    }

    /**
     * Return node
     *
     * @param integer $nodeId Node id
     *
     * @return Node|null
     *
     * @throws \Exception
     */
    public function getNode($nodeId = null) {
        $query = $this->nodeRepository->findOneNodeQuery($nodeId);

        return $query->getOneOrNullResult();
    }

    /**
     * Return nodes
     *
     * @param integer $treeId Tree id
     *
     * @throws \Exception
     */
    public function getNodeChildrens($nodeId = null, $treeId = null) {
        $query = $this->nodeRepository->findAllNodeInRowQuery($nodeId, $treeId);

        return $query->getResult();
    }

}
