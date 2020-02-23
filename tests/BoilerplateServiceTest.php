<?php

namespace HttpConnect\Boilerplate\Tests;

use HttpConnect\Boilerplate\BoilerplateService;
use HttpConnect\Boilerplate\Transport\BoilerplateInput;
use HttpConnect\HttpConnect\Service\External\Exceptions\RequirementNotMetException;
use HttpConnect\HttpConnect\Validation\Exceptions\MetadataValidationFailedException;
use PHPUnit\Framework\TestCase;
use Psr\Http\Client\ClientExceptionInterface;

class BoilerplateServiceTest extends TestCase
{
    /**
     * @throws RequirementNotMetException
     * @throws MetadataValidationFailedException
     * @throws ClientExceptionInterface
     */
    public function testBoilerplateAction(): void
    {
        $service = new BoilerplateService();

        $service->performBoilerplateAction(new BoilerplateInput(
            'Foo',
            'Bar',
            'foo@bar.com'
        ));

        $this->assertTrue(true);
    }
}
