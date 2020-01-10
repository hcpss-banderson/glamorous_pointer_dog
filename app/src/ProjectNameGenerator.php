<?php

namespace HCPSS;

/**
 * A class for generating team names based on HCPSS school mascots.
 */
class ProjectNameGenerator {
    /**
     * A list of all HCPSS school mascots.
     *
     * @var string[]
     */
    protected $mascots = [
        'Beaver',
        'Bobcat',
        'Bulldog',
        'Cheetah',
        'Cobra',
        'Comet',
        'Cougar',
        'Dolphin',
        'Dragon',
        'Eagle',
        'Elk',
        'Falcon',
        'Freddie Falcon',
        'Gator',
        'Gladiator',
        'Golden Bear',
        'Gordy Gator',
        'Hawk',
        'Jaguar',
        'Knight',
        'Leopard',
        'Lightning',
        'Lion',
        'Mighty Duck',
        'Mountain Lion',
        'Mustang',
        'Panther',
        'Phoenix',
        'Pointer Dog',
        'Raccoon',
        'Raider',
        'Ranger Bear',
        'Retriever',
        'Roadrunner',
        'Rolling Thunder',
        'Scorpion',
        'Shark',
        'Soaring Eagle',
        'Steam Engine',
        'Swan',
        'Thunderbird',
        'Tiger',
        'Tuffy the Tiger',
        'Viking',
        'Wildcat',
        'Wolf',
    ];
    /**
     * A list of positive adjectives.
     *
     * @var string[]
     */
    protected $adjectives = [
        'Agreeable',
        'Brave',
        'Calm',
        'Delightful',
        'Eager',
        'Faithful',
        'Gentle',
        'Happy',
        'Jolly',
        'Kind',
        'Lively',
        'Nice',
        'Obedient',
        'Proud',
        'Relieved',
        'Silly',
        'Thankful',
        'Victorious',
        'Witty',
        'Zealous',
        'Adorable',
        'Beautiful',
        'Clean',
        'Elegant',
        'Fancy',
        'Glamorous',
        'Handsome',
        'Magnificent',
        'Old-fashioned',
        'Quaint',
        'Sparkling',
        'Better',
        'Careful',
        'Clever',
        'Easy',
        'Famous',
        'Gifted',
        'Helpful',
        'Important',
        'Powerful',
        'Rich',
        'Shy',
        'Tender',
        'Vast',
    ];
    /**
     * Generate a team name.
     *
     * @return string
     */
    public function generate() {
        return vsprintf('%s %s', [
            $this->randomAdjective(),
            $this->randomMascot(),
        ]);
    }
    /**
     * Get a random adjective.
     *
     * @return string
     */
    protected function randomAdjective() {
        return $this->adjectives[array_rand($this->adjectives)];
    }
    /**
     * Get a random mascot.
     *
     * @return string
     */
    protected function randomMascot() {
        return $this->mascots[array_rand($this->mascots)];
    }
}
