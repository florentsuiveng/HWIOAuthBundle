<?php

/*
 * This file is part of the HWIOAuthBundle package.
 *
 * (c) Hardware Info <opensource@hardware.info>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HWI\Bundle\OAuthBundle\Tests\OAuth\ResourceOwner;

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\EveOnlineResourceOwner;
use HWI\Bundle\OAuthBundle\Test\OAuth\ResourceOwner\GenericOAuth2ResourceOwnerTestCase;

final class EveOnlineResourceOwnerTest extends GenericOAuth2ResourceOwnerTestCase
{
    protected $resourceOwnerClass = EveOnlineResourceOwner::class;
    protected $userResponse = <<<json
{
    "CharacterID": "1",
    "CharacterName": "bar"
}
json;

    protected $paths = [
        'identifier' => 'CharacterID',
        'nickname' => 'CharacterName',
        'realname' => 'CharacterName',
    ];
}
