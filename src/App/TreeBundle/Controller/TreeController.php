<?php

namespace App\TreeBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;

/**
 * @author    Kamil Socha <ksfuldrew@gmail.com>
 */
class TreeController extends Controller {

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction() {
        $list = $this->get('tree.service')->getAllTrees();

        return $this->render('AppTreeBundle:Dashboard:index.html.twig', [
            'list' => $list
        ]);
    }

    /**
     * @param integer $nodeId Node Id
     * @param integer $treeId Tree Id
     */
    private function loadChildren($nodeId, $treeId) {
        try {
            $dbNodes  = $this->get('node.service')->getNodeChildrens($nodeId, $treeId);
        } catch (\Exception $e) {
            throw new BadRequestHttpException("Unable to load children node");
        }

        $nodes = [];
        foreach ($dbNodes as $row) {
            $nodes[] = array(
                'id' => $row->getNodeId(),
                'name' => $row->getName(),
                'content' => $row->getContent(),
                'nodes' => $this->loadChildren($row->getNodeId(), $treeId),
            );
        }

        return $nodes;
    }

    /**
     * @param integer $nodeId Node Id
     * @param integer $treeId Tree Id
     */
    public function loadRootNode($nodeId, $treeId) {
        try {
            $node = $this->get('node.service')->getNode($nodeId);
        } catch (\Exception $e) {
            throw new BadRequestHttpException("Unable to load root node");
        }

        $tree = [];
        $tree['id'] = $node->getNodeId();
        $tree['name'] = $node->getName();
        $tree['content'] = $node->getContent();
        $tree['nodes'] = $this->loadChildren($node->getNodeId(), $treeId);

        return $tree;
    }

    /**
     * @param integer $treeId Tree id
     *
     */
    public function getAction($treeId = null) {
        try {
            $nodes = $this->get('node.service')->getNodes($treeId);
            $tree = $this->loadRootNode($nodes[0]->getId(), $treeId);
        } catch (\Exception $e) {
            throw new BadRequestHttpException("Unable to load json");
        }

        $response = array("code" => 200, "success" => true, "data" => array($tree));
        return new Response(json_encode($response));
    }

    /**
     * @param request Tree array
     */
    public function postAction(Request $request) {
        try {
            $this->get('doctrine');
            $this->get('tree.service')->save($request->getContent());
            $list = $this->get('tree.service')->getAllTrees();
        } catch (\Exception $e) {
            throw new BadRequestHttpException("Unable to save json");
        }

        $response = array("code" => 200, "success" => true, "list" => $list);
        return new Response(json_encode($response));
    }

}
