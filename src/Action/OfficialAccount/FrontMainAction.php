<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 5/15/18
 * Time: 6:38 PM
 */

namespace Action\OfficialAccount;


use Action\ActionInterface;
use Contract\Container;
use EasyWeChat\Payment\Application;
use Handler\EntityUtils;
use Handler\BackedHandler;
use Handler\WxJsHandler;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Service\BillService;
use Service\WxPaymentService;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Router;
use Slim\Views\Twig;

/**
 * Class WxScanInfoAction
 *
 * redirect_url?code=##&state=##
 *
 * @package Wx\Action
 */
class FrontMainAction implements ActionInterface
{
    /**
     * @var WxJsHandler
     */
    private $wxHandler;
    /**
     * @var BackedHandler
     */
    private $backedHandler;
    /**
     * @var Twig
     */
    private $view;
    /**
     * @var Application
     */
    private $application;
    /**
     * @var BillService
     */
    private $billService;
    /**
     * @var Logger
     */
    private $logger;

    /**
     * ActionInterface constructor.
     *
     * @param \Psr\Container\ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->wxHandler = $container[Container::NAME_HANDLER_WX_JS];
        $this->backedHandler = $container[Container::NAME_HANDLER_BACKED];
        $this->view = $container[Container::NAME_VIEW];
        $this->application = $container[Container::NAME_WX_PAYMENT];
        $this->billService = $container[BillService::class];
        $this->logger = $container[Container::NAME_LOGGER];
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
        if($this->backedHandler->isFree($user)){
            $adQrCode = $this->backedHandler->getAdQrCode($user,$state);
            return $this->view->render($response,'/test/adCode.phtml',['adQrCode'=>$adQrCode]);
        }

        $wxPaymentService = new WxPaymentService($this->application,$this->billService,$this->logger);

        $config = $wxPaymentService->getWxPaymentConfig($openId,0.01);

        return $this->view->render($response,'/wx/payment.phtml',['config'=>$config]);

    }
}