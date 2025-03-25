<?php
namespace App\Command;

use App\Entity\Jugador;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DesconectarInactivosCommand extends Command
{
    protected static $defaultName = 'app:desconectar-inactivos';

    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();
        $this->em = $em;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $umbral = new \DateTime('-30 seconds');

        $qb = $this->em->createQueryBuilder();
        $qb->update(Jugador::class, 'j')
            ->set('j.online', ':offline')
            ->where('j.lastSeen < :umbral')
            ->setParameter('offline', false)
            ->setParameter('umbral', $umbral)
            ->getQuery()
            ->execute();

        $output->writeln("Jugadores inactivos desconectados.");

        return 0;
    }
}