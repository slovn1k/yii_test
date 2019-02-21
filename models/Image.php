<?php

namespace app\models;

use Yii;
use yii\helpers\BaseFileHelper;

/**
 * Class Image
 * @package app\models
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 */
class Image extends \yii\db\ActiveRecord
{

    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['image_path', 'title'], 'required'],
            [['image_path', 'title'], 'string'],
        ];
    }

    public function upload()
    {
        BaseFileHelper::createDirectory('../uploads/');

        if ($this->validate()) {
            $this->imageFile->saveAs('../uploads/' . $this->imageFile->baseName . "." . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'imageFile' => 'ImageFile'
        ];
    }
}
