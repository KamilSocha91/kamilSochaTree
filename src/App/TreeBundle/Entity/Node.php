<?php
namespace App\TreeBundle\Entity;

/**
 * Class Node
 *
 * @author    Kamil Socha <kamil.socha@gmail.com>
 */
class Node {

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $nodeId;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $parentId;

    /**
     * @var Tree
     */
    private $tree;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId () {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content Node content
     *
     * @return Node
     */
    public function setContent ($content) {
        $this->content = $content;
        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent () {
        return $this->content;
    }

    /**
     * Set nodeId
     *
     * @param string $nodeId Node nodeId
     *
     * @return Node
     */
    public function setNodeId ($nodeId) {
        $this->nodeId = $nodeId;
        return $this;
    }

    /**
     * Get nodeId
     *
     * @return string
     */
    public function getNodeId() {
        return $this->nodeId;
    }

    /**
     * Set name
     *
     * @param string $name Node name
     *
     * @return Node
     */
    public function setName ($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName () {
        return $this->name;
    }

    /**
     * Set parentId
     *
     * @param integer $parentId Node parentId
     *
     * @return Node
     */
    public function setParentId ($parentId) {
        $this->parentId = $parentId;
        return $this;
    }

    /**
     * Get parentId
     *
     * @return integer
     */
    public function getParentId () {
        return $this->parentId;
    }

    /**
     * Get Tree
     *
     * @return ArrayCollection
     */
    public function getTree () {
        return $this->tree;
    }

    /**
     * Set Tree
     *
     * @param ArrayCollection $tree Tree instance
     *
     * @return Node
     */
    public function setTree ($tree) {
        $this->tree = $tree;

        return $this;
    }

}

