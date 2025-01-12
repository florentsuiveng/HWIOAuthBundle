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

use HWI\Bundle\OAuthBundle\OAuth\ResourceOwner\HubicResourceOwner;
use HWI\Bundle\OAuthBundle\OAuth\Response\AbstractUserResponse;
use HWI\Bundle\OAuthBundle\Test\OAuth\ResourceOwner\GenericOAuth2ResourceOwnerTestCase;

final class HubicResourceOwnerTest extends GenericOAuth2ResourceOwnerTestCase
{
    protected $resourceOwnerClass = HubicResourceOwner::class;
    protected $userResponse = '{ "email": "1", "firstname": "bar", "activated": true , "creationDate": "2013-12-31T19:09:42+01:00", "language": "fr", "status": "ok", "offer": "25g", "lastname": "foo" }';
    protected $paths = [
        'identifier' => 'email',
        'nickname' => 'firstname',
        'firstname' => 'firstname',
        'lastname' => 'lastname',
        'realname' => 'firstname',
        'email' => 'email',
    ];

    public function testGetUserInformationFirstAndLastName()
    {
        $this->mockHttpClient($this->userResponse, 'application/json; charset=utf-8');

        /**
         * @var AbstractUserResponse
         */
        $userResponse = $this->resourceOwner->getUserInformation(['access_token' => 'token']);

        $this->assertEquals('bar', $userResponse->getFirstName());
        $this->assertEquals('foo', $userResponse->getLastName());
    }

    public function testGetAuthorizationUrl()
    {
        $this->assertEquals(
            $this->options['authorization_url'].'&response_type=code&client_id=clientid&state=eyJzdGF0ZSI6InJhbmRvbSJ9&redirect_uri=http%3A%2F%2Fredirect.to%2F',
            $this->resourceOwner->getAuthorizationUrl('http://redirect.to/')
        );
    }
}
