<?php
namespace App\TreeBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Tree
 *
 * @author    Kamil Socha <kamil.socha@gmail.com>
 */
class Tree {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var ArrayCollection
     */
    private $nodes;

    public function __construct() {
        $this->nodes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId () {
        return $this->id;
    }

    /**
     * @param Node $nodes Node instance
     *
     * @return Tree
     */
    public function addNode(Node $node) {
        $this->nodes->add($node);

        return $this;
    }

    /**
     * Get Node
     *
     * @return ArrayCollection
     */
    public function getNodes () {
        return $this->nodes;
    }

    /**
     * Remove nodes
     *
     * @param Node $nodes
     */
    public function removeNodes (Node $nodes) {
        $this->nodes->removeElement($nodes);
    }

    /**
     * Set Node
     *
     * @param ArrayCollection $nodes Node instance
     *
     * @return Tree
     */
    public function setNodes ($nodes) {
        $this->nodes = $nodes;

        return $this;
    }

}

