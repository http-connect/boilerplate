<?php

namespace HttpConnect\Boilerplate\Action;

use HttpConnect\Boilerplate\Transport\BoilerplateInput;
use HttpConnect\Boilerplate\Transport\BoilerplateResource;
use HttpConnect\HttpConnect\Action\Action;
use HttpConnect\HttpConnect\Transport\InputInterface;
use HttpConnect\HttpConnect\Transport\ResourceInterface;
use InvalidArgumentException;
use Nyholm\Psr7\Stream;
use Nyholm\Psr7\Uri;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;
use Rize\UriTemplate;

class BoilerplateAction extends Action
{
    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return 'Boilerplate Action';
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return 'Boilerplate Action Description';
    }

    /**
     * @return string
     */
    protected function getMethod(): string
    {
        return self::GET;
    }

    /**
     * @param InputInterface $input
     * @return UriInterface
     */
    protected function createUri(InputInterface $input): UriInterface
    {
        return new Uri((new UriTemplate())->expand('boilerplate'));
    }

    /**
     * @param ResponseInterface $response
     * @return ResourceInterface
     */
    public function transformResponse(ResponseInterface $response): ResourceInterface
    {
        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        return new BoilerplateResource(
            $data['firstName'],
            $data['lastName'],
            $data['email']
        );
    }

    /**
     * @param InputInterface $input
     * @return StreamInterface|null
     */
    protected function createBody(InputInterface $input): ?StreamInterface
    {
        if (!$input instanceof BoilerplateInput) {
            throw new InvalidArgumentException(
                'Expected ' . BoilerplateInput::class . ' but got ' . get_class($input) . '.'
            );
        }

        return Stream::create((string) $input);
    }
}
