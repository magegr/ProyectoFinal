<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class AuthController extends AbstractController
{
    #[Route('/api/register', name: 'api_register', methods: ['POST'])]
    public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // Validaciones básicas
        if (!isset($data['email']) || !isset($data['password']) || !isset($data['name'])) {
            return new JsonResponse(
                ['error' => 'Rellena los campos obligatorios'],
                Response::HTTP_BAD_REQUEST
            );
        }

        // Verificar si el usuario ya existe
        $existingUser = $em->getRepository(User::class)->findOneBy(['email' => $data['email']]);
        if ($existingUser) {
            return new JsonResponse(
                ['error' => 'El email ya está registrado'],
                Response::HTTP_CONFLICT
            );
        }

        // Crear usuario con contraseña hasheada
        $user = new User();
        $user->setEmail($data['email']);
        $user->setPassword($passwordHasher->hashPassword($user, $data['password']));
        $user->setRoles(['ROLE_USER']);

        $user->setName($data['name']);
        $user->setSurname1($data['surname1']);
        if (isset($data['surname2'])) {
            $user->setSurname2($data['surname2']);
        }
        if (isset($data['phone'])) {
            $user->setPhone($data['phone']);
        }
        $user->setActive(true);

        $em->persist($user);
        $em->flush();

        return new JsonResponse([
            'message' => 'Usuario registrado correctamente',
            'user' => [
                'id' => $user->getId(),
                'email' => $user->getEmail(),
                'name' => $user->getName(),
                'surname1' => $user->getSurname1(),
                'surname2' => $user->getSurname2(),
                'phone' => $user->getPhone(),
                'active' => $user->isActive(),
                'created_at' => $user->getCreatedAt()->format('Y-m-d H:i:s'),
            ]
        ], Response::HTTP_CREATED);
    }

    #[Route('/api/login_check', name: 'api_login_check', methods: ['POST'])]
    public function loginCheck(): JsonResponse
    {
        throw new \LogicException('This method should not be reached!');
    }
}
