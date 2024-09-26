<?php

namespace App\Services;

use App\Contracts\Dao\BmiDaoInterface;
use App\Contracts\Services\BmiServiceInterface;

class BmiService implements BmiServiceInterface
{
    /**
     *Bmi Dao
     */
    private $bmiDao;

    /**
     * Class Constructor
     * @param BmiDaoInterface
     * @return void
     */
    public function __construct(BmiDaoInterface $bmiDao)
    {
        $this->bmiDao = $bmiDao;
    }

    /**
     * ShowBmi
     * @return void
    */
    public function store() : void
    {
      $this->bmiDao->store();
    }
}
