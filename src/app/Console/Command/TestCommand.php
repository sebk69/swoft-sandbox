<?php declare(strict_types=1);
/**
 * This file is part of Swoft.
 *
 * @link     https://swoft.org
 * @document https://swoft.org/docs
 * @contact  group@swoft.org
 * @license  https://github.com/swoft-cloud/swoft/blob/master/LICENSE
 */

namespace App\Console\Command;

use App\Bundles\TestModel\Dao\TestSku;
use Swoft\Console\Annotation\Mapping\Command;
use Swoft\Console\Annotation\Mapping\CommandMapping;
use Swoft\Console\Exception\ConsoleErrorException;
use Swoft\Console\Helper\Show;
use Swoft\Http\Server\Router\Route;
use function input;
use function output;
use function sprintf;

/**
 * Class TestCommand
 *
 * @since 2.0
 *
 * @Command(name="app:test",coroutine=false)
 */
class TestCommand
{
    /**
     * @CommandMapping(name="fixtures")
     */
    public function fixtures(): void
    {
        /** @var TestSku $dao */
        $dao = bean("sebk_small_orm_dao")->get("TestModel", "TestSku");
        /** @var \App\Bundles\TestModel\Model\TestSku $newModel */
        $newModel = $dao->newModel();
        $newModel->setDateCreation(date("Y-m-d H:i:s"));
        $newModel->setIdExterne("test");
        $newModel->setIdUtilisateur(1);
        $newModel->setIdTicketGroupe(1);
        $newModel->setNomAgent("Seb");
        $newModel->setLienTool(1);
        $newModel->persist();
    }

}
