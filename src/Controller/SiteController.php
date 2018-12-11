<?php

namespace App\Controller;

use App\UseCases\CodeService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SiteController extends AbstractController
{
    /**
     * @Route("/", name="nextCode")
     *
     * @param CodeService $service
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Exception
     */
    public function nextCode(CodeService $service)
    {
        $code = $service->getNextCode();

        return $this->render('site/nextCode.html.twig', [
            'code' => $code,
        ]);
    }
}
