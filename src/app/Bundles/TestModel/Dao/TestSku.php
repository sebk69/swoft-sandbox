<?php
namespace App\Bundles\TestModel\Dao;

use Sebk\SmallOrmCore\Dao\AbstractDao;

class TestSku extends AbstractDao
{
    protected function build()
    {
        $this->setDbTableName("test_sku")
            ->setModelName("TestSku")
            ->addPrimaryKey("id_ticket_agent", "idTicketAgent")
            ->addField("id_ticket_groupe", "idTicketGroupe")
            ->addField("id_externe", "idExterne")
            ->addField("id_utilisateur", "idUtilisateur")
            ->addField("nom_agent", "nomAgent")
            ->addField("lien_tool", "lienTool")
            ->addField("date_creation", "dateCreation", date("Y-m-d H:i:s"))
        ;
    }

    public function getFirsts($num)
    {
        $query = $this->createQueryBuilder();
        $query->limit(0, $num);
        return $this->getResult($query);
    }

}
