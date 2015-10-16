<?php

namespace skeeks\cms\models;

use Yii;

/**
 * This is the model class for table "{{%cms_tree_file}}".
 *
 * @property integer $id
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $storage_file_id
 * @property integer $tree_id
 * @property integer $priority
 *
 * @property CmsTree $tree
 * @property CmsStorageFile $storageFile
 */
class CmsTreeFile extends \skeeks\cms\models\Core
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cms_tree_file}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_by', 'updated_by', 'created_at', 'updated_at', 'storage_file_id', 'tree_id', 'priority'], 'integer'],
            [['storage_file_id', 'tree_id'], 'required'],
            [['storage_file_id', 'tree_id'], 'unique', 'targetAttribute' => ['storage_file_id', 'tree_id'], 'message' => \Yii::t('app','The combination of Storage File ID and Tree ID has already been taken.')]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'storage_file_id' => Yii::t('app', 'Storage File ID'),
            'tree_id' => Yii::t('app', 'Tree ID'),
            'priority' => Yii::t('app', 'Priority'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTree()
    {
        return $this->hasOne(CmsTree::className(), ['id' => 'tree_id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStorageFile()
    {
        return $this->hasOne(CmsStorageFile::className(), ['id' => 'storage_file_id']);
    }
}