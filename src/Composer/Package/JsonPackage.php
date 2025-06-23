<?php

namespace Composer\Package;

use Symfony\Component\JsonStreamer\Attribute\JsonStreamable;
use Symfony\Component\JsonStreamer\Attribute\ValueTransformer;

#[JsonStreamable]
class JsonPackage
{
    public ?string $name = null;
    public ?string $description = null;
    public ?string $type = null;

    public ?string $version = null;
    public ?string $versionNormalized = null;

    public ?string $homepage = null;
    public array $keywords = [];
    #[ValueTransformer(nativeToStream: [self::class, 'transformStringToArray'])]
    public array $license = [];
    public array $authors = [];
    public array $support = [];
    public array $funding = [];
    public bool $abandoned = false;
    public string $minimumStability = 'stable';
    public bool $preferStable = false;

    public ?array $archive = null;
    public bool $defaultBranch = false;
    public array $includePath = [];
    public ?string $installationSource = null;
    public ?string $notificationUrl = null;
    public ?array $phpExt = null;
    public ?string $targetDir = null;
    public ?string $time = null;
    public array $transportOptions = [];

    public ?array $source = null;
    public ?array $dist = null;

    #[ValueTransformer(nativeToStream: [self::class, 'transformStringToArray'])]
    public array $bin = [];
    public array $config = [];
    public array $extra = [];
    public array $scripts = [];

    public array $autoload = [];
    public array $autoloadDev = [];

    public array $require = [];
    public array $requireDev = [];
    public array $conflict = [];
    public array $provide = [];
    public array $replace = [];
    public array $suggest = [];

    public array $nonFeatureBranches = [];

    public function toArray(): array
    {
        return [
            'name' => $this->name,
        ];
    }

    public function getLinks(string $type): array
    {
        return match ($type) {
            'require' => $this->require,
            'require-dev' => $this->requireDev,
            'conflict' => $this->conflict,
            'provide' => $this->provide,
            'replace' => $this->replace,
            'suggest' => $this->suggest,
        };
    }

    public static function transformStringToArray(array|string $bin): array
    {
        return \is_string($bin) ? [$bin] : $bin;
    }
}
