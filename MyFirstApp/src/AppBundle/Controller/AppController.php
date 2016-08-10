<?php
// src/AppBundle/Controller/AppController.php
namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;


class AppController extends Controller
{
    /**
     * @Route("/")
     */
    public function viewHome(Request $request)
    {
        return $this->render('default/instructions.html.twig');
    }

    /**
     * @Route("/products/create/{name}/{price}/{des}/")
     */
    public function viewProductsCreate($name, $price, $des)
    {
        // create new product and assign values
        $product = new Product();
        $product->setName($name);
        $product->setPrice($price);
        $product->setDescription($des);

        // this is some special doctrine query thing
        // might be similar to a query object in sqla before query is made
        // more likely it is the db.session object
        $em = $this->getDoctrine()->getManager();

        // tells Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id '.$product->getId());
    }

    /**
     * @Route("/products/{productId}/")
     */
    public function viewProductsDetail($productId)
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

    /**
     * @Route("/products/")
     */
    public function viewProductList()
    {
        $product = $this->getDoctrine()
            ->getRepository('AppBundle:Product')
            ->findAll();

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$productId
            );
        }
        $product = $product[0];


        // return new Response('product id: '.$product->getId()."<br />product name: ".$product->getName()."<br />product price: ".$product->getPrice());
        return $this->render('default/product-list.html.twig', array(
                'product' => array(
                'id' => $product->getId(),
                'name' => $product->getName(),
                'description' => $product->getDescription(),
                'price' => $product->getPrice(),)
        //     'base_dir' => realpath($this->container->getParameter('kernel.root_dir').'/..'),
        ));

    }

}



