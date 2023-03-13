<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\UserRepository;
use App\Security\EmailVerifier;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;

class RegistrationController extends AbstractController
{
  private EmailVerifier $emailVerifier;

  public function __construct(EmailVerifier $emailVerifier)
  {
    $this->emailVerifier = $emailVerifier;
  }

  /**
   * Get new user info, validate, and hash password.
   * @param Request $request
   * @param UserPasswordHasherInterface $userPasswordHasher
   * @param EntityManagerInterface $entityManager
   * @return Response
   */
  #[Route('/register', name: 'register_user')]
  public function new(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
  {


    $user = new User();
    $form = $this->createForm(RegistrationFormType::class, $user);
    //handles the request if it is a post data
    $form->handleRequest($request);

    //if form submitted and is valid
    if ($form->isSubmitted() && $form->isValid()) {
      // encode the plain password
      $user->setPassword(
        $userPasswordHasher->hashPassword(
          $user,
          $form->get('plainPassword')->getData()
        )
      );

      $date = new \DateTime();
      $user->setCreatedAt( $date);

      $entityManager->persist($user);
      $entityManager->flush();

      // generate a signed url and email it to the user
//      $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
//        (new TemplatedEmail())
//          ->from(new Address('mailer@island.co.uk', 'Island Mailer'))
//          ->to($user->getEmail())
//          ->subject('Please Confirm your Email')
//          ->htmlTemplate('registration/confirmation_email.html.twig')
//      );
      // do anything else you need here, like send an email
//      $mailer->send();

      return $this->render('home/index.html.twig');
    }
    //if first registration, redirect to register twig
    return $this->render('registration/index.html.twig', [
      'form' => $form->createView(),
//      'errors' => $errors
    ]);
  }

  /**
   * Email verification
   *
   * @param Request $request
   * @param UserRepository $userRepository
   * @return Response
   */
  #[Route('/verify/email', name: 'app_verify_email')]
  public function verifyUserEmail(Request $request, UserRepository $userRepository): Response
  {
    $id = $request->get('id');

    if (null === $id) {
      return $this->redirectToRoute('app_register');
    }

    $user = $userRepository->find($id);

    if (null === $user) {
      return $this->redirectToRoute('app_register');
    }

    // validate email confirmation link, sets User::isVerified=true and persists
    try {
      $this->emailVerifier->handleEmailConfirmation($request, $user);
    } catch (VerifyEmailExceptionInterface $exception) {
      $this->addFlash('verify_email_error', $exception->getReason());

      return $this->redirectToRoute('app_register');
    }

    // @TODO Change the redirect on success and handle or remove the flash message in your templates
    $this->addFlash('success', 'Your email address has been verified.');

    return $this->redirectToRoute('app_register');
  }
}
