<?php

namespace Drupal\ex4_rest\Plugin\rest\resource;

use Drupal\Core\Database\Database;
use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Provides a resource for external user data.
 *
 * @RestResource(
 *   id = "ex4",
 *   label = @Translation("Sample external data"),
 *   uri_paths = {
 *     "canonical" = "/ex4_rest/{id}"
 *   }
 * )
 */
class Ex4RestResource extends ResourceBase {

  /**
   * Responds to GET requests.
   *
   * Returns the user record from the external MySQL database for
   * the specified ID.
   *
   * @param int $id The ID of the user
   *
   * @return \Drupal\rest\ResourceResponse The response containing user data
   *
   * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
   * @throws \Symfony\Component\HttpKernel\Exception\BadRequestHttpException
   */
  public function get($id = NULL) {
    if ($id) {
      // Use the external database
      Database::setActiveConnection('govcon');
      $connection = Database::getConnection();
      $sth = $connection->select('users', 'u')
        ->fields([
          'id',
          'fname',
          'lname',
          'email',
        ])
        ->condition('u.id', $id);
      $data = $sth->execute();
      $result = $data->fetchAssoc(\PDO::FETCH_OBJ);
      if (!empty($result)) {
        return new ResourceResponse($result);
      }

      throw new NotFoundHttpException($this->t('User with ID ' . $id . ' was not found'));
    }

    throw new BadRequestHttpException($this->t('No user ID was provided'));
  }

}
