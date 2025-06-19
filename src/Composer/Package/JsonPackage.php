<?php

namespace Composer\Package;

use Symfony\Component\JsonStreamer\Attribute\JsonStreamable;
use Symfony\Component\JsonStreamer\Attribute\ValueTransformer;

#[JsonStreamable]
class JsonPackage
{
    public ?string $name = null;
    public ?string $type = null;

    public ?string $version = null;
    public ?string $versionNormalized = null;

    public ?string $targetDir = null;

    public array $source = [];
    public array $dist = [];

    #[ValueTransformer(nativeToStream: [self::class, 'parseBin'])]
    public array $bin = [];
    public array $extra = [];

    public array $nonFeatureBranches = [];

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public function getLinks(string $type): array
    {
        return [];
    }

    public static function parseBin(array|string $bin): array
    {
        return \is_string($bin) ? [$bin] : $bin;
    }
}
