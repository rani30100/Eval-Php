<?php

namespace App\DataFixtures;

use DateTimeImmutable;
use Faker\Factory;
use App\Entity\Offers;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $faker = Factory::create('fr_FR');
        

        $offers = [];
        for ($i = 0; $i < 10; $i++) {
            $offer = new Offers;
            $offer
            ->setTitle($faker->jobTitle())
            // ->setAvatar($faker->imageUrl(640, 480, 'person', true))
            ->setDescription($faker->text())
            ->setDateAdded($faker->dateTime())
            ->setExpirationDate($faker->dateTime());
            
            $offers[] = $offer;
            $manager->persist($offer);
            $offers[] = $offer;
        }
        $manager->flush();
    }
}
        
        // $ingredients = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $ingredient = new Ingredient;
        //     $ingredient
        //         ->setType($faker->randomElement(['fruit', 'légume']))
        //         ->setDescription($faker->text())
        //         ->setImage($faker->imageUrl(640, 480, 'food', true))
        //         ->setName($faker->word());
        //     $manager->persist($ingredient);
        //     $ingredients[] = $ingredient;
        // }

        // $summerStart = new \DateTimeImmutable('2023-06-21');
        // $fallStart = new \DateTimeImmutable('2023-09-23');
        // $springStart = new \DateTimeImmutable('2023-03-20');
        // $winterStart = new \DateTimeImmutable('2023-12-21');

        // $summer = new Season;
        // $summer
        //     ->setName('Summer')
        //     ->setStartAt($summerStart)
        //     ->setEndAt($fallStart);
        // $manager->persist($summer);

        // $spring = new Season;
        // $spring
        //     ->setName('Spring')
        //     ->setStartAt($springStart)
        //     ->setEndAt($summerStart);
        // $manager->persist($spring);

        // $winter = new Season;
        // $winter
        //     ->setName('Winter')
        //     ->setStartAt($winterStart)
        //     ->setEndAt($springStart);
        // $manager->persist($winter);

        // $fall = new Season;
        // $fall
        //     ->setName('Fall')
        //     ->setStartAt($fallStart)
        //     ->setEndAt($winterStart);
        // $manager->persist($fall);

        // $seasons = [$summer, $spring, $winter, $fall];


        // $ingredients = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $ingredient = new Ingredient;
        //     $ingredient

        //         ->setType($faker->randomElement(['fruit', 'légume']))
        //         ->setDescription($faker->text())
        //         ->setImage($faker->imageUrl(640, 480, 'food', true))
        //         ->setName($faker->word())
        //         ->addSeason($faker->randomElement($seasons));
        //     $manager->persist($ingredient);
        //     $ingredients[] = $ingredient;
        // }

        // $recipes = [];
        // for ($i = 0; $i < 10; $i++) // recipe
        // {
        //     $recipe = new Recipe();
        //     $recipe
        //         ->setName($faker->words(10, true))
        //         ->setDescription($faker->text())
        //         ->setLevel($faker->numberBetween(1,3))
        //         ->setImage("http://www.cuisine-francaise.org/blog/wp-content/uploads/2009/10/COQUILLES-SAINT-JACQUES-PIERRTTES-GUIDE.jpg")
        //         ->addSeason($faker->randomElement($seasons))
        //         ->addLikedBy($faker->randomElement($users))
        //         ->setType(RecypeTypes::Starter)
        //         ;
        //     $manager->persist($recipe);
        //     $recipes[] = $recipe;
        // }

        // $comments = [];
        // for ($i = 0; $i < 30; $i++) {
        //     $comment = new Comment();
        //     $comment
        //         ->setContent($faker->text())
        //         ->setUser($faker->randomElement($users))
        //         ->setRecipe($faker->randomElement($recipes));

        //     $manager->persist($comment);
        //     $comments[] = $comment;
        // }

        // $newsletters = [];
        // for ($i = 0; $i < 10; $i++) {
        //     $newsletter = new Newsletter();
        //     $newsletter
        //         ->setContent($faker->sentence(30))
        //         ->setSendAt(DateTimeImmutable::createFromMutable($faker->dateTime()))
        //         ->addRecipe($faker->randomElement($recipes))
        //         ->addRecipe($faker->randomElement($recipes))
        //         ->addRecipe($faker->randomElement($recipes));

        //     $manager->persist($newsletter);
        //     $newsletters[] = $newsletter;
        // }

        // $recipeIngredients = [];
        // for ($i = 0; $i < 53; $i++) {
        //     $recipeIngredient = new RecipeIngredient();
        //     $recipeIngredient
        //         ->setRecipe($faker->randomElement($recipes))
        //         ->setIngredient($faker->randomElement($ingredients))
        //         ->setQuantity($faker->randomDigitNotNull() . ' ' . $faker->randomElement(['Kg', 'g', 'L', 'ml']));

        //     $manager->persist($recipeIngredient);
        //     $recipeIngredients[] = $recipeIngredient;
        // }

