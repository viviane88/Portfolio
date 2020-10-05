<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Skill;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    
    public function load(ObjectManager $manager)
    {
        


        for($i =1; $i<= 5; $i++){        
        
        $skill = new Skill();
        $skill->setLevel(random_int(1,10));
        $skill->setName('skill'.$i);
        $manager->persist($skill);

    }

        $manager->flush();
    }
}
