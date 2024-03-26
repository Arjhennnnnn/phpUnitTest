<?php

namespace App;

class Game
{

    /**
     * The number of frames in a game
     */
    const FRAMES_PER_GAME = 10;


    /**
     * All rolls for the game
     * 
     * @var array
     * 
     */
    protected array $rolls = [];


    /**
     * Roll the Ball
     * 
     * @param int
     * @return void
     * 
     */
    public function roll(int $pins)
    {

        $this->rolls[] = $pins;
    }


    /**
     * Calculate the final score
     * 
     * @return int
     * 
     */
    public function score()
    {

        $score = 0;

        $roll = 0;


        foreach (range(1, self::FRAMES_PER_GAME) as $frame) {

            // check for strike

            if ($this->isStrike($roll)) {

                // you got a strike

                $score += $this->pinCount($roll) + $this->strikeBonus($roll);

                $roll += 1;

                continue; // refactor else if to -> if
                // The continue statement stops the current iteration in the for loop and continue with the next.
            }

            // check for a spare

            $score += $this->defaultFrameScore($roll);


            if ($this->isSpare($roll)) {

                // you got a spare

                $score += $this->spareBounus($roll);
            }

            $roll += 2;
        }

        // return array_sum($this->rolls);
        return $score;
    }

    /**
     * Determine if the current roll was a strike
     * 
     * @param int $roll
     * @return bool
     */
    protected function isStrike(int $roll): bool
    {
        return $this->rolls[$roll] == 10;
    }


    /**
     * Determine if the current frame was a spare
     * 
     * @param int $roll
     * @return bool
     */
    protected function isSpare(int $roll): bool
    {
        return $this->defaultFrameScore($roll) == 10;
    }


    /**
     * Calculate the score for the frame
     * 
     * @param int $roll
     * @return int
     */
    protected function defaultFrameScore(int $roll): int
    {
        return $this->pinCount($roll) + $this->pinCount($roll + 1);
    }


    /**
     * Get the bonus for a strike
     * 
     * @param int $roll
     * @return int
     */
    protected function strikeBonus(int $roll): int
    {
        return $this->pinCount($roll + 1) + $this->pinCount($roll + 2);
    }

    /**
     * Get the bonus for a spare
     * 
     * @param int $roll
     * @return int
     */
    protected function spareBounus(int $roll): int
    {
        return $this->pinCount($roll + 2);
    }


    /**
     * Get the bonus for a spare
     * 
     * @param int $roll
     * @return int
     */
    protected function pinCount(int $roll): int
    {
        return $this->rolls[$roll];
    }
}
