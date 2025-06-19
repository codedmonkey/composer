<?php

namespace Composer\Package;

use Symfony\Component\JsonStreamer\Attribute\JsonStreamable;

#[JsonStreamable]
class JsonPackage
{
    public ?string $name = null;

    public ?string $version = null;
    public ?string $versionNormalized = null;

    public array $source = [];
    public array $dist = [];

    public array $nonFeatureBranches = [];

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }
}
