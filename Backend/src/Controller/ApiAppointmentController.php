<?php

namespace App\Controller;

use App\Entity\Appointment;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/appointment', name: 'api_appointment_')]
final class ApiAppointmentController extends AbstractController
{
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $appointments = $em->getRepository(Appointment::class)->findAll();
        $data = [];

        foreach ($appointments as $appointment) {
            $data[] = [
                'id' => $appointment->getId(),
                'name' => $appointment->getName(),
                'surname1' => $appointment->getSurname1(),
                'surname2' => $appointment->getSurname2(),
                'firstTime' => $appointment->isFirstTime(),
                'type' => $appointment->getType(),
                'acceptedTerms' => $appointment->isAgreeTerms(),
                'phone' => $appointment->getPhone(),
                'email' => $appointment->getEmail(),
                'datetime' => $appointment->getDatetime()?->format('Y-m-d\TH:i')
                //'user_id' => $appointment->getUser() ? $appointment->getUser()->getId() : null,
            ];
        }

        return $this->json($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Appointment $appointment): JsonResponse
    {
        return $this->json([
            'id' => $appointment->getId(),
            'name' => $appointment->getName(),
            'surname1' => $appointment->getSurname1(),
            'surname2' => $appointment->getSurname2(),
            'firstTime' => $appointment->isFirstTime(),
            'type' => $appointment->getType(),
            'acceptedTerms' => $appointment->isAgreeTerms(),
            'phone' => $appointment->getPhone(),
            'email' => $appointment->getEmail(),
            'datetime' => $appointment->getDatetime()->format('Y-m-d\TH:i')

            /*'user' => $appointment->getUser() ? [
                'id' => $appointment->getUser()->getId(),
                'email' => $appointment->getUser()->getEmail(),
            ] : null,*/
        ]);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $appointment = new Appointment();
        $appointment->setName($data['name']);
        $appointment->setSurname1($data['surname1']);
        $appointment->setSurname2($data['surname2'] ?? null);
        $appointment->setFirstTime((bool)($data['firstTime'] ?? false));
        $appointment->setType($data['type']);
        $appointment->setAgreeTerms((bool)($data['agreeTerms'] ?? false));
        $appointment->setPhone($data['phone'] ?? null);
        $appointment->setEmail($data['email'] ?? '');
        $appointment->setDatetime(new \DateTimeImmutable($data['datetime']));

        /*if (isset($data['user_id'])) {
            $user = $em->getRepository(User::class)->find($data['user_id']);
            if ($user) {
                $appointment->setUser($user);
            }
        }*/

        $em->persist($appointment);
        $em->flush();

        return $this->json([
            'message' => 'Cita creada correctamente',
            'id' => $appointment->getId()
        ], 201);
    }

    #[Route('/{id}', methods: ['PUT'], name: 'update')]
    public function update(Request $request, Appointment $appointment, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) $appointment->setName($data['name']);
        if (isset($data['surname1'])) $appointment->setSurname1($data['surname1']);
        if (isset($data['surname2'])) $appointment->setSurname2($data['surname2']);
        if (isset($data['firstTime'])) $appointment->setFirstTime((bool)$data['firstTime']);
        if (isset($data['type'])) $appointment->setType($data['type']);
        if (isset($data['acceptedTerms'])) $appointment->setAgreeTerms((bool)$data['acceptedTerms']);
        if (isset($data['phone'])) $appointment->setPhone($data['phone']);
        if (isset($data['email'])) $appointment->setEmail($data['email']);
        if (isset($data['datetime'])) $appointment->setDatetime(new \DateTimeImmutable($data['datetime']));
        /*if (isset($data['user_id'])) {
            $user = $em->getRepository(User::class)->find($data['user_id']);
            if ($user) {
                $appointment->setUser($user);
            }
        }*/

        $em->flush();

        return $this->json(['message' => 'Cita actualizada correctamente']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(Appointment $appointment, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($appointment);
        $em->flush();

        return $this->json(['message' => 'Cita eliminada correctamente']);
    }
}
