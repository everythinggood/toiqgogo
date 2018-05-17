<?php
/**
 * Created by PhpStorm.
 * User: ycy
 * Date: 4/24/18
 * Time: 10:47 AM
 */

namespace Contract;


interface Container
{

    const NAME_RENDERER = 'renderer';

    const NAME_LOGGER = 'logger';

    const NAME_SETTING = 'setting';

    const NAME_HTTP_CLIENT = 'http-client';

    const NAME_HANDLER_WX_JS = 'wx-js-handler';

    const NAME_HANDLER_PLANE = 'plane-handler';

    const NAME_WX_APP = 'wx-app';

}