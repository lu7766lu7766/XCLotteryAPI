<?php

namespace Modules\Passport\Http\Controllers;

use Illuminate\Routing\Controller;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\Http\Controllers\ConvertsPsrResponses;
use Laravel\Passport\Passport;
use League\OAuth2\Server\AuthorizationServer;
use Modules\Account\Entities\Account;
use Modules\Passport\Http\Requests\PersonalTokenGenerateRequest;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response as Psr7Response;

class PassportController extends Controller
{
    use ConvertsPsrResponses;
    /**
     * @var AuthorizationServer
     */
    private $server;

    public function __construct(AuthorizationServer $server)
    {
        $this->server = $server;
    }

    /**
     * Authorize a client to access the user's account.
     * It expire in now add 3 day.
     * @param  \Psr\Http\Message\ServerRequestInterface $request
     * @return \Illuminate\Http\Response
     * @throws \League\OAuth2\Server\Exception\OAuthServerException
     */
    public function issueToken(ServerRequestInterface $request)
    {
        Passport::tokensExpireIn(now()->addDays(3));
        $token = $this->convertResponse(
            $this->server->respondToAccessTokenRequest($request, new Psr7Response)
        );

        return $token;
    }

    /**
     * 令牌有效期三年
     * @param PersonalTokenGenerateRequest $request
     * @param ClientRepository $client
     * @return array
     */
    public function personalTokenGenerate(PersonalTokenGenerateRequest $request, ClientRepository $client)
    {
        Passport::tokensExpireIn(now()->addYears(3));
        /** @var Account $user */
        $user = \Auth::user();
        $userClient = $client->activeForUser($user->getAuthIdentifier())->first();
        if (is_null($userClient)) {
            $client->createPersonalAccessClient(
                $user->getAuthIdentifier(),
                $user->account . '_personal_client',
                ''
            );
        }
        $token = $user->createToken($request->getDescription());

        return [
            'token' => $token->accessToken,
            'name'  => $token->token->getAttribute('name')
        ];
    }
}
