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

#[Route('/api/user', name: 'api_user_')]
final class ApiUserController extends AbstractController
{
    //prueba
    #[Route('/me', methods: ['GET'], name: 'me')]
    public function me(): JsonResponse
    {
        $user = $this->getUser();

        if (!$user instanceof User) {
            return new JsonResponse(['error' => 'No autenticado'], Response::HTTP_UNAUTHORIZED);
        }

        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'roles' => $user->getRoles(),
            'name' => $user->getName(),
            'surname1' => $user->getSurname1(),
            'surname2' => $user->getSurname2(),
            'phone' => $user->getPhone(),
            'active' => $user->isActive(),
            'createdAt' => $user->getCreatedAt()?->format(\DateTimeInterface::ATOM),
        ]);
    }
//
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $users = $em->getRepository(User::class)->findAll();
        $data = [];

        foreach ($users as $u) {
            $data[] = [
                'id' => $u->getId(),
                'email' => $u->getEmail(),
                'roles' => $u->getRoles(),
                'name' => $u->getName(),
                'surname1' => $u->getSurname1(),
                'surname2' => $u->getSurname2(),
                'phone' => $u->getPhone(),
                'active' => $u->isActive(),
                'createdAt' => $u->getCreatedAt()?->format('Y-m-d H:i:s'),
            ];
        }

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(User $user): JsonResponse
    {
        return $this->json([
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'roles' => $user->getRoles(),
            'name' => $user->getName(),
            'surname1' => $user->getSurname1(),
            'surname2' => $user->getSurname2(),
            'phone' => $user->getPhone(),
            'active' => $user->isActive(),
            'createdAt' => $user->getCreatedAt()?->format('Y-m-d H:i:s'),
        ]);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        $user = new User();
        $user->setEmail($data['email']);
        $user->setName($data['name']);
        $user->setSurname1($data['surname1']);
        $hashedPassword = $hasher->hashPassword($user, $data['password']);
        $user->setPassword($hashedPassword);
        $user->setSurname2($data['surname2'] ?? null);
        $user->setPhone($data['phone'] ?? null);
        $user->setActive($data['active'] ?? true);
        $user->setRoles($data['roles'] ?? ['ROLE_USER']);
        $user->setCreatedAt(new \DateTimeImmutable());

        $em->persist($user);
        $em->flush();

        return $this->json(['message' => 'Usuario creado con éxito', 'id' => $user->getId()], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(
        Request $request,
        User $user,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $hasher
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (isset($data['email'])) $user->setEmail($data['email']);
        if (isset($data['name'])) $user->setName($data['name']);
        if (isset($data['surname1'])) $user->setSurname1($data['surname1']);
        if (isset($data['surname2'])) $user->setSurname2($data['surname2']);
        if (isset($data['phone'])) $user->setPhone($data['phone']);
        if (isset($data['active'])) $user->setActive((bool)$data['active']);
        if (isset($data['roles'])) $user->setRoles($data['roles']);

        if (isset($data['password'])) {
            $hashedPassword = $hasher->hashPassword($user, $data['password']);
            $user->setPassword($hashedPassword);
        }

        $em->flush();

        return $this->json(['message' => 'Usuario actualizado correctamente']);
    }


    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(User $user, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($user);
        $em->flush();

        return $this->json(['message' => 'Usuario eliminado correctamente']);
    }
}
