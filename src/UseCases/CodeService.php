<?php

namespace App\UseCases;

use App\Entity\Code;
use App\Repository\CodeRepository;
use App\Services\Ean13Generator;

/**
 * Class CodeService
 * @package App\UseCases
 *
 * @property CodeRepository $repository
 * @property Ean13Generator $ean13
 */
class CodeService
{
    private $repository;
    private $ean13;

    public function __construct(CodeRepository $repository, Ean13Generator $ean13)
    {
        $this->repository = $repository;
        $this->ean13 = $ean13;
    }

    /**
     * @throws \Exception
     */
    public function getNextCode(): Code
    {
        $code = $this->repository->find(1);
        $value = $code->getValue();
        $nextValue = $this->ean13->getNextValue($value);
        $code->setValue($nextValue);
        $this->repository->save($code);

        return $code;
    }
}