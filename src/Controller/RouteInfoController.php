<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Routing\Annotation\Route;

class RouteInfoController extends AbstractController
{
    #[Route('/routes', name: 'route_info', methods: ['GET'])]
    public function index(RouterInterface $router): JsonResponse
    {
        $routes = [];
        foreach ($router->getRouteCollection() as $name => $route) {
            $methods = $route->getMethods();
            if (empty($methods)) {
                $methods = ['GET'];
            }

            $routes[] = [
                'uri'    => ltrim($route->getPath(), '/'),
                'method' => implode('|', $methods),
                'target' => $name,
            ];
        }

        usort($routes, fn($a, $b) => strcmp($a['uri'], $b['uri']));

        return new JsonResponse($routes);
    }
}
