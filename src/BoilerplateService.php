<?php

namespace HttpConnect\Boilerplate;

use HttpConnect\Boilerplate\Action\BoilerplateAction;
use HttpConnect\HttpConnect\Action\ActionPack;
use HttpConnect\HttpConnect\Config\Config;
use HttpConnect\HttpConnect\Config\RepositoryInterface;
use HttpConnect\HttpConnect\Service\External\SymfonyHttpClientAdapterService;
use HttpConnect\HttpConnect\Transport\InputInterface;
use HttpConnect\HttpConnect\Transport\ResourceInterface;
use HttpConnect\HttpConnect\Validation\Exceptions\MetadataValidationFailedException;
use Psr\Container\ContainerInterface;
use Psr\Http\Client\ClientExceptionInterface;

final class BoilerplateService extends SymfonyHttpClientAdapterService
{
    /**
     * @return ContainerInterface
     */
    protected static function createActionPack(): ContainerInterface
    {
        return new ActionPack([
            new BoilerplateAction(),
        ]);
    }

    /**
     * @param array $rawConfig
     * @return RepositoryInterface
     * @throws MetadataValidationFailedException
     */
    public static function createConfig(array $rawConfig): RepositoryInterface
    {
        return new Config([
            'baseUri' => 'https://api.example.com/',
        ]);
    }

    /**
     * @param InputInterface $input
     * @return ResourceInterface
     * @throws MetadataValidationFailedException
     * @throws ClientExceptionInterface
     */
    public function performBoilerplateAction(InputInterface $input): ResourceInterface
    {
        return $this->call(BoilerplateAction::class, $input);
    }
}
