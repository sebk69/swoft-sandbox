<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Http\Controller;

use App\Bundles\BecaModel\Dao\Clients;
use Sebk\SmallOrmSwoft\Factory\Dao;
use Swoft\Co;
use Swoft\Http\Server\Annotation\Mapping\Controller;
use Swoft\Http\Server\Annotation\Mapping\RequestMapping;
use Swoft\Bean\Annotation\Mapping\Inject;

use App\Http\Middleware\JsonMiddleware;
use Swoft\Http\Server\Annotation\Mapping\Middleware;
use Swoft\Http\Server\Annotation\Mapping\Middlewares;
use Swoft\Http\Message\Request;


/**
 * Class SebkController
 *
 * @since 2.0
 *
 * @Controller("sebk")
 * @Middlewares({
 *     @Middleware (JsonMiddleware::class)
 * })
 */
class SebkController
{
    /**
     * @Inject()
     *
     * @var Dao
     */
    private $daoFactory;

    /**
     * @RequestMapping("testAsync")
     * @Middleware (JsonMiddleware::class)
     *
     * @param Request $request
     * @return array
     */
    public function testAsync(Request $request): array
    {
        $num = $request->get("num");

        /** @var Clients $clientDao */
        $clientDao = $this->daoFactory->get('TestModel', 'TestSku');


        $requests = [];
        for ($i = 0; $i < $num; $i++) {
            $requests[] = function () use ($clientDao) {
                try {
                    return $clientDao->getFirsts(1);;
                } catch (\Exception $e) {
                    return [$e->getMessage()];
                }
            };
        }

        $result = [];
        foreach (Co::multi($requests) as $part) {
            $result = array_merge($result, $part);
        }

        return $result;
    }
}
