<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/product', name: 'api_product_')]
final class ApiProductController extends AbstractController
{
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $products = $em->getRepository(Product::class)->findAll();
        $data = [];

        foreach ($products as $product) {
            $data[] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'stock' => $product->getStock(),
                'active' => $product->isActive(),
            ];
        }

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Product $product): JsonResponse
    {
        return $this->json([
            'id' => $product->getId(),
            'name' => $product->getName(),
            'description' => $product->getDescription(),
            'price' => $product->getPrice(),
            'stock' => $product->getStock(),
            'type' => $product->getType(),
            'active' => $product->isActive(),
            'trend' => $product->getTrend(),
            'mount_type' => $product->getMountType(),
            'material' => $product->getMaterial(),
            'gender' => $product->getGender(),
            'color' => $product->getColor(),
            'graduation' => $product->getGraduation(),
            'duration' => $product->getDuration(),
            'diameter' => $product->getDiameter(),
            'image' => $product->getImage() ? '../../public/uploads/' . $product->getImage() : '',
        ]);
    }


    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $product = new Product();

        $product->setName($data['name']);
        $product->setDescription($data['description']);
        $product->setPrice((float)$data['price']);
        $product->setStock((int)$data['stock']);
        $product->setTrend($data['trend']);
        $product->setType($data['type'] ?? null);
        $product->setActive($data['active'] ?? true);
        $product->setMountType($data['mount_type'] ?? null);
        $product->setMaterial($data['material'] ?? null);
        $product->setGender($data['gender'] ?? null);
        $product->setColor($data['color'] ?? null);
        $product->setGraduation($data['graduation'] ?? null);
        $product->setDuration($data['duration'] ?? null);
        $product->setDiameter(isset($data['diameter']) ? (float)$data['diameter'] : null);

        $em->persist($product);
        $em->flush();

        return $this->json(['message' => 'Producto creado correctamente', 'id' => $product->getId()], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(Request $request, Product $product, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) $product->setName($data['name']);
        if (isset($data['description'])) $product->setDescription($data['description']);
        if (isset($data['price'])) $product->setPrice((float)$data['price']);
        if (isset($data['stock'])) $product->setStock((int)$data['stock']);
        if (isset($data['type'])) $product->setType($data['type']);
        if (isset($data['active'])) $product->setActive((bool)$data['active']);
        if (isset($data['trend'])) $product->setTrend($data['trend']);
        if (isset($data['mount_type'])) $product->setMountType($data['mount_type']);
        if (isset($data['material'])) $product->setMaterial($data['material']);
        if (isset($data['gender'])) $product->setGender($data['gender']);
        if (isset($data['color'])) $product->setColor($data['color']);
        if (isset($data['graduation'])) $product->setGraduation($data['graduation']);
        if (isset($data['duration'])) $product->setDuration($data['duration']);
        if (isset($data['diameter'])) $product->setDiameter((float)$data['diameter']);

        $em->flush();

        return $this->json(['message' => 'Producto actualizado correctamente']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(Product $product, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($product);
        $em->flush();

        return $this->json(['message' => 'Producto eliminado correctamente']);
    }
}
