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

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\PaypalResourceOwner;
use HWI\Bundle\OAuthBundle\Test\OAuth\ResourceOwner\GenericOAuth2ResourceOwnerTestCase;

/**
 * Class PaypalResourceOwnerTest.
 *
 * @author Berny Cantos <be@rny.cc>
 */
final class PaypalResourceOwnerTest extends GenericOAuth2ResourceOwnerTestCase
{
    protected $resourceOwnerClass = PaypalResourceOwner::class;
    protected $userResponse = <<<json
{
    "user_id": "1",
    "email": "bar",
    "name": "Example Default"
}
json;
    protected $paths = [
        'identifier' => 'user_id',
        'nickname' => 'email',
        'realname' => 'name',
    ];

    protected $authorizationUrlBasePart = 'http://user.auth/?test=2&response_type=code&client_id=clientid&scope=openid+email';
}
