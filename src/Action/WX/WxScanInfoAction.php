<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 6:38 PM
 */

namespace Wx\Action;


use Action\ActionInterface;
use Contract\Container;
use Handler\EntityUtils;
use Handler\PlaneHandler;
use Handler\WxJsHandler;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Class WxScanInfoAction
 *
 * redirect_url?code=##&state=##
 *
 * @package Wx\Action
 */
class WxScanInfoAction implements ActionInterface
{
    /**
     * @var WxJsHandler
     */
    private $wxHandler;
    /**
     * @var PlaneHandler
     */
    private $planeHandler;

    /**
     * ActionInterface constructor.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->wxHandler = $container[Container::NAME_HANDLER_WX_JS];
        $this->planeHandler = $container[Container::NAME_HANDLER_PLANE];
    }

    /**
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param array $args
     * @throws \Exception
     * @return mixed
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        /** @var Request $request */
        $code = $request->getParam('code');
        $state = $request->getParam('state');

        $openId = $this->wxHandler->getOpenidByCode($code);

        $accessToken = $this->wxHandler->getAccessTokenByFile();

        $userArr = $this->wxHandler->getUserInfo($accessToken,$openId);

        $user = EntityUtils::convertToUser($userArr);

        /** @var Response $response */
        if($this->planeHandler->isFree($user)){
            $adQrCode = $this->planeHandler->getAdQrCode($user,$state);
            return $response->write(json_encode([
                "is_free"=>true,
                'adQrCode'=>$adQrCode
            ]));
        }

        return $response->write(json_encode([
            'is_free'=>false
        ]));

    }
}