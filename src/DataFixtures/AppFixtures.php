<?php

// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\Post;
use App\Entity\User;
use App\Entity\Photo;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Symfony\Component\Validator\Constraints\DateTime;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 obj! Bam!
        for ($i = 0, $file_i=0; $i < 21; $i++, $file_i++) {
            if($file_i >= 3){
                $file_i=0;
            }
            $user = new User();
            $user->setLogin('user '.$i);
            $user->setEmail('user_'.$i.'@example.com');
            $user->setPassword('pwd____'.$i);
            $user->setPhone('+89001239'.$i);
            $manager->persist($user);
            $post = new Post();
            $post->setUser($user);
            // $date = new \DateTime();
            $post->setDate(new \DateTime());
            $post->setComment('comment_'.$i);
            $manager->persist($post);
            $photo = new Photo();
            $photo->setPost($post);
            $photo->setName('photo_'.$i);
            $photo->setPath('img/imleedh-ali-Uf-_p8zZiT8-unsplash.jpg');
            $photo->setFormat('jpg');
            $manager->persist($photo);
        }

        $manager->flush();
    }
}