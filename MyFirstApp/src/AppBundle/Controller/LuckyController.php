<?php
// src/AppBundle/Controller/LuckyController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;

class LuckyController extends Controller
{
    /**
     * @Route("/lucky/number")
     */
    public function numberAction()
    {
        $number = mt_rand(0, 100);

        return $this->render('lucky/number.html.twig', array(
            'number' => $number
        ));
    }

    /**
     * @Route("/")
     */
    public function indexAction(Request $request)
    {
        $number = mt_rand(0, 100);

        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));
    }

    /**
     * @Route("/product/create/{name}/{price}/{des}/")
     */
    public function createAction($name, $price, $des)
    {
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($des);

        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());

    }

    /**
     * @Route("/product/{productId}/")
     */
    public function showAction($productId)
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->find($productId);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }


        // return new Response('product id: '.$product->getId()."<br />product name: ".$product->getName()."<br />product price: ".$product->getPrice());
        return $this->render('default/product-view.html.twig', array(
                'product' => array(
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),)
        //     'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));

    }


}



