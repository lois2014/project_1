<?php
  namespace  Services;

  use Common\BaseServices;

  class FileUploadService extends BaseServices{
      
      public function uploadValidFile($file){

          $valid_type = [
              'image/jpeg',
              'image/png',
              'image/gif',
              'application/msword',
              'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
              'application/vnd.ms-powerpoint',
              'application/vnd.openxmlformats-officedocument.presentationml.presentation',
              'application/vnd.ms-excel',
              'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
              'application/pdf',
              'text/plain',
          ];
          $type = $file['type'];

          if(in_array($type,$valid_type)) {
             return true;
          }
              return false;

      }
      public function addFile($data){
          $em = $this->getDoctrine()->getManager();
          $em->persist($data);
          $em->flush();
          return $data->getId();

      }

  }
