<?php
/**
 * Created by PhpStorm.
 * User: ruslankus
 * Date: 10/08/16
 * Time: 14:45
 */

namespace app\controllers;


use app\models\GalleryItems;
use app\models\TempContent;

class DataController extends AppController
{




    public function actionIndex()
    {
        $categories = [

            1 => ['new_id' => 2, 'name' => 'Starter'],
            2 => ['new_id' => 4, 'name' => 'Alternator'],
            3 => ['new_id' => 3, 'name' => 'Starter parts'],
            4 => ['new_id' => 5, 'name' => 'Alternator parts'],
        ];

        $content = [];

        $data = GalleryItems::find()->asArray()->all();


        foreach ($data as $item){

            if(false !== strpos($item['body'], '>>')){


                $tmp = explode('>>', $item['body']);

                $model = new TempContent();

                $model->old_id = $item['id'];
                $model->name = $tmp[0];
                //devided content if exist
                if(false !== strpos($tmp[1], 'Â»')){

                    $t = explode('Â»', $tmp[1]);
                    $model->text = !empty($t[0])? $t[0] : $tmp[1];
                    $model->text2 = !empty($t[1]) ? $t[1] : '';

                }else {

                    $model->text = $tmp[1];
                    $model->text2 = !empty($tmp[2])? $tmp[2] : '';
                }


                $cat =  $categories[$item['gallery_id']];

                $model->img = $item['picture_file_name'];
                $model->img_type = $item['picture_content_type'];
                $model->gallery_id = $item['gallery_id'];
                $model->category_id = $cat['new_id'];
                $model->category_name = $cat['name'];

                $model->save();



            }else if(false !== strpos($item['body'], 'Â»')){

                $tmp = explode('Â»', $item['body']);

                $cat =  $categories[$item['gallery_id']];

                $model = new TempContent();

                $model->old_id = $item['id'];
                $model->name = $tmp[0];
                $model->text = $tmp[1];
                $model->text2 = !empty($tmp[2])? $tmp[2] : '';
                $model->img = $item['picture_file_name'];
                $model->img_type = $item['picture_content_type'];
                $model->gallery_id = $item['gallery_id'];
                $model->category_id = $cat['new_id'];
                $model->category_name = $cat['name'];


                $model->save();

            }

        }




        return "DATA/INDEX";
    }

}