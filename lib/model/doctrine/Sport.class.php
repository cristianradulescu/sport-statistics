<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Sport extends BaseSport
{
  /*
   * Sport id as constant
   */
  const SOCCER = 14;

  /**
   * Returns the toString representation
   * @return string
   */
  public function  __toString()
  {
    return $this->sport;
  }
}