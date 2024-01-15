<?php

declare(strict_types=1);

use Symplify\MonorepoBuilder\ComposerJsonManipulator\ValueObject\ComposerJsonSection;
use Symplify\MonorepoBuilder\Config\MBConfig;

return static function (MBConfig $mbConfig): void {

    $mbConfig->packageAliasFormat('<major>.<minor>-dev');
    $mbConfig->packageDirectories(array_merge(
        glob(__DIR__."/src/Auburnite/Component/*", GLOB_ONLYDIR | GLOB_NOSORT),
        glob(__DIR__."/src/Auburnite/Bundle/*", GLOB_ONLYDIR | GLOB_NOSORT),
        glob(__DIR__."/src/Auburnite/Contracts/*", GLOB_ONLYDIR | GLOB_NOSORT),
        glob(__DIR__."/src/Auburnite/Contracts", GLOB_ONLYDIR | GLOB_NOSORT)
    ));
    //Data to Add, after merge
    $mbConfig->dataToAppend([
        ComposerJsonSection::AUTOLOAD => [
            'psr-4' => [
//                "Auburnite\\Auburnite\\" => "src/Auburnite/",
                "Auburnite\\Bundle\\" => "src/Auburnite/Bundle/",
                "Auburnite\\Component\\" => "src/Auburnite/Component/",
            ],
        ],
        ComposerJsonSection::REQUIRE_DEV => [
            'symplify/monorepo-builder' => '^11.2',
            "symfony/filesystem" => "^6.4|^7.0",
        ]
    ]);
};
