<?php

namespace App\Contracts\Dao\Admin;

/**
 * Interface of Data Access Object for task
 */
interface AdminDaoInterface
{
  /**
   * return export users
   */
    public function exportuser(): object;
}

