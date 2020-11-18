<?php
abstract class VideosManager
{
  /**
   * Méthode permettant d'ajouter une video.
   * @param $video Video La video à ajouter
   * @return void
   */
  abstract protected function addVideo(Video $video);
  
  /**
   * Méthode renvoyant le nombre de video total.
   * @return int
   */
  abstract public function countVideo();
  
  /**
   * Méthode permettant de supprimer une video.
   * @param $id int L'identifiant de la video à supprimer
   * @return void
   */
  abstract public function deleteVideo($idVideo);
  
  /**
   * Méthode retournant une liste de video demandée.
   * @param $debut int La première video à sélectionner
   * @param $limite int Le nombre de video à sélectionner
   * @return array La liste des video. Chaque entrée est une instance de Video.
   */
  abstract public function getListVideo($debut = -1, $limite = -1);
  
  /**
   * Méthode retournant une video précise.
   * @param $id int L'identifiant de la video à récupérer
   * @return Video La video demandée
   */
  abstract public function getUniqueVideo($idVideo);
  
  /**
   * Méthode permettant d'enregistrer une video.
   * @param $video Video la video à enregistrer
   * @see self::add()
   * @see self::modify()
   * @return void
   */
  public function saveVideo(Video $video)
  {
    if ($video->isValidVideo())
    {
      $video->isVideo() ? $this->addVideo($video) : $this->updateVideo($video);
    }
    else
    {
      throw new RuntimeException('La video doit être valide pour être enregistrée');
    }
  }
  
  /**
   * Méthode permettant de modifier une video.
   * @param $video video la video à modifier
   * @return void
   */
  abstract protected function updateVideo(Video $video);
  
  abstract public function lastVideo($debut = -1, $limite = -1);
}
?>