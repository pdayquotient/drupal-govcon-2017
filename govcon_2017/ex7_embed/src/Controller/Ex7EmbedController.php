<?php
/**
 * @file
 * Contains \Drupal\ex7_embed\Controller\Ex7JsonFormsController.
 *
 * Controller for example fields and formatters.
 */

namespace Drupal\ex7_embed\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\Component\Utility\Unicode;
use Drupal;

class Ex7JsonFormsController extends ControllerBase {


  /**
   * Returns response for the exampleuser name autocompletion.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The current request object containing the search string.
   *
   * @return \Symfony\Component\HttpFoundation\JsonResponse
   *   A JSON response containing the autocomplete suggestions for example users.
   */
  public function user_autocomplete(Request $request) {

    //@todo get from external JSON data

    $matches = array('pday' => array('username' => 'pday', 'fullname' => 'Paul Day', 'email' => 'pday@quotient-inc.com'),
      'rbartlett' => array('username' => 'rbartlett', 'fullname' => 'Rebecca Bartlett', 'email' => 'rbartlett@quotient-inc.com'));
/*    $matches = array();
    $string = $request->query->get('q');
    if ($string) {
      $countries = \Drupal::service('country_manager')->getList();
      foreach ($countries as $iso2 => $country) {
        if (strpos(Unicode::strtolower($country), Unicode::strtolower($string)) !== FALSE) {
          $matches[] = array('value' => $country, 'label' => $country);
        }
      }
    }
*/
    return new JsonResponse($matches);
  }


}