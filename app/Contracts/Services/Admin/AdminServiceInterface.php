<?php

namespace App\Contracts\Services\Admin;

/**
 * Interface for user service
*/
interface AdminServiceInterface
{
  /**
   * return export users
   */
  public function exportuser(): object;
}
