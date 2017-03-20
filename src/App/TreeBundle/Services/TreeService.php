<?php
namespace App\TreeBundle\Services;

use App\TreeBundle\Entity\TreeRepository;
use App\TreeBundle\Entity\Tree;

/**
 * Class TreeService
 *
 * @author    Kamil Socha <kamil.socha@gmail.com>
 */
class TreeService  {

    /**
     * @var TreeRepository
     */
    private $treeRepository;

    /**
     * TreeService constructor.
     *
     * @param TreeRepository $treeRepository Tree repository instance
     *
     */
    public function __construct (treeRepository $treeRepository) {
        $this->treeRepository = $treeRepository;
    }

    /**
     * Save entity
     *
     * @param array   $result Request data
     *
     * @return void
     *
     * @throws \Exception
     */
    public function save($result) {
        try {
            $nodes = json_decode($result, true);
        } catch (\Exception $e) {
            throw new BadRequestHttpException("Corrupted json");
        }

        $this->treeRepository->save($nodes);
    }

    /**
     * Return trees list
     *
     * @return Tree|null
     */
    public function getAllTrees() {
        $query = $this->treeRepository->findAlltreesQuery();

        return $query->getArrayResult();
    }

}
